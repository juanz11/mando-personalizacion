<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'El carrito está vacío.');
        }

        $total = round(collect($cart)->sum(fn ($item) => $item['price'] * ($item['quantity'] ?? 1)), 2);

        $prefill = session('checkout_prefill', []);
        $user = auth()->user();

        return view('checkout.index', [
            'cart' => $cart,
            'total' => $total,
            'prefill' => $prefill,
            'user' => $user,
            'stripeKey' => config('services.stripe.key'),
            'paypalClientId' => config('services.paypal.client_id'),
        ]);
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'El carrito está vacío.');
        }

        $base = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:50'],
            'shipping_address' => ['required', 'string'],
            'shipping_city' => ['required', 'string', 'max:255'],
            'shipping_state' => ['required', 'string', 'max:255'],
            'shipping_zip' => ['required', 'string', 'max:20'],
            'shipping_country' => ['required', 'in:VE,US'],
        ]);

        $country = $base['shipping_country'];
        $base['shipping_address'] = $base['shipping_state'] . ' - ' . $base['shipping_address'];
        unset($base['shipping_state']);

        $total = round(collect($cart)->sum(fn ($item) => $item['price'] * ($item['quantity'] ?? 1)), 2);

        $paymentRules = $country === 'VE'
            ? [
                'payment_method' => ['required', 'in:binance,pago_movil'],
                'payment_receipt' => ['required', 'image', 'max:5120'],
            ]
            : [
                'payment_method' => ['required', 'in:stripe,paypal'],
                'stripe_token' => ['required_if:payment_method,stripe', 'nullable', 'string', 'max:255'],
                'paypal_order_id' => ['required_if:payment_method,paypal', 'nullable', 'string', 'max:64'],
            ];

        $payment = $request->validate($paymentRules);

        $receiptPath = null;
        if ($request->hasFile('payment_receipt')) {
            $receiptPath = $request->file('payment_receipt')->store('receipts', 'public');
        }

        $orderNumber = 'RTE-' . now()->format('Ymd') . '-' . strtoupper(uniqid());

        if ($country === 'US' && $payment['payment_method'] === 'stripe') {
            $amount = (int) round($total * 100);
            $currency = config('services.stripe.currency', 'usd');

            try {
                $response = Http::withToken(config('services.stripe.secret'))
                    ->asForm()
                    ->timeout(15)
                    ->withOptions(['connect_timeout' => 10])
                    ->post('https://api.stripe.com/v1/charges', [
                        'amount' => $amount,
                        'currency' => $currency,
                        'source' => $payment['stripe_token'],
                        'description' => 'RTE Order ' . $orderNumber,
                    ]);
            } catch (\Exception $e) {
                return back()->withInput()->with('error', 'No se pudo conectar con Stripe. Verificá tu conexión e intentá de nuevo.');
            }

            if ($response->failed()) {
                $error = $response->json()['error']['message'] ?? 'No se pudo procesar el pago con Stripe.';
                return back()->withInput()->with('error', $error);
            }
        }

        if ($country === 'US' && $payment['payment_method'] === 'paypal') {
            $baseUrl = config('services.paypal.mode') === 'live'
                ? 'https://api-m.paypal.com'
                : 'https://api-m.sandbox.paypal.com';
            $currency = config('services.paypal.currency', 'USD');

            try {
                $tokenResponse = Http::asForm()
                    ->withBasicAuth(config('services.paypal.client_id'), config('services.paypal.secret'))
                    ->timeout(15)
                    ->withOptions(['connect_timeout' => 10])
                    ->post($baseUrl . '/v1/oauth2/token', [
                        'grant_type' => 'client_credentials',
                    ]);

                if ($tokenResponse->failed()) {
                    return back()->withInput()->with('error', 'No se pudo autenticar con PayPal.');
                }

                $captureResponse = Http::withToken($tokenResponse->json('access_token'))
                    ->timeout(15)
                    ->withOptions(['connect_timeout' => 10])
                    ->post($baseUrl . '/v2/checkout/orders/' . $payment['paypal_order_id'] . '/capture');
            } catch (\Exception $e) {
                return back()->withInput()->with('error', 'No se pudo conectar con PayPal. Verificá tu conexión e intentá de nuevo.');
            }

            if ($captureResponse->failed()) {
                $error = $captureResponse->json('details.0.description')
                    ?? $captureResponse->json('message')
                    ?? 'No se pudo procesar el pago con PayPal.';
                return back()->withInput()->with('error', $error);
            }

            $capture = $captureResponse->json('purchase_units.0.payments.captures.0');
            $capturedAmount = $capture['amount']['value'] ?? null;
            $capturedCurrency = $capture['amount']['currency_code'] ?? $currency;

            if (
                $captureResponse->json('status') !== 'COMPLETED'
                || ($capture['status'] ?? 'COMPLETED') !== 'COMPLETED'
                || abs((float) $capturedAmount - $total) > 0.01
                || $capturedCurrency !== $currency
            ) {
                return back()->withInput()->with('error', 'El pago de PayPal no se completó correctamente.');
            }
        }

        $order = Order::create([
            ...$base,
            'payment_method' => $payment['payment_method'],
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'status' => 'paid',
            'total' => $total,
            'items_json' => $cart,
            'payment_receipt' => $receiptPath,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['product_name'],
                'model' => $item['model'] ?? 'ps5',
                'price' => $item['price'],
                'quantity' => $item['quantity'] ?? 1,
                'configuration' => $item['configuration'] ?? [],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.show', $order)->with('success', 'Compra realizada correctamente.');
    }

    public function receipt(string $path)
    {
        if (!str_starts_with($path, 'receipts/')) {
            abort(404);
        }

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return Storage::disk('public')->response($path);
    }
}
