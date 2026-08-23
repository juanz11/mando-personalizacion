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

        $total = collect($cart)->sum(fn ($item) => $item['price'] * ($item['quantity'] ?? 1));

        $prefill = session('checkout_prefill', []);
        $user = auth()->user();

        return view('checkout.index', [
            'cart' => $cart,
            'total' => $total,
            'prefill' => $prefill,
            'user' => $user,
            'stripeKey' => config('services.stripe.key'),
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

        $total = collect($cart)->sum(fn ($item) => $item['price'] * ($item['quantity'] ?? 1));

        $paymentRules = $country === 'VE'
            ? [
                'payment_method' => ['required', 'in:binance,pago_movil'],
                'payment_receipt' => ['required', 'image', 'max:5120'],
            ]
            : [
                'payment_method' => ['required', 'in:stripe'],
                'stripe_token' => ['required', 'string', 'max:255'],
            ];

        $payment = $request->validate($paymentRules);

        $receiptPath = null;
        if ($request->hasFile('payment_receipt')) {
            $receiptPath = $request->file('payment_receipt')->store('receipts', 'public');
        }

        $orderNumber = 'RTE-' . now()->format('Ymd') . '-' . strtoupper(uniqid());

        if ($country === 'US') {
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
