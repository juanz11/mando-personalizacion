<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'El carrito está vacío.');
        }

        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:50'],
            'shipping_address' => ['required', 'string'],
            'shipping_city' => ['required', 'string', 'max:255'],
            'shipping_zip' => ['required', 'string', 'max:20'],
            'shipping_country' => ['required', 'string', 'max:100'],
        ]);

        $total = collect($cart)->sum(fn ($item) => $item['price'] * ($item['quantity'] ?? 1));

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'RTE-' . now()->format('Ymd') . '-' . strtoupper(uniqid()),
            'status' => 'paid',
            'total' => $total,
            'items_json' => $cart,
            ...$data,
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
}
