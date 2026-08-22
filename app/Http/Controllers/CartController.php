<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'product_name' => ['required', 'string', 'max:255'],
            'model' => ['required', 'in:ps5,xbox'],
            'price' => ['required', 'numeric', 'min:0'],
            'configuration' => ['nullable', 'string'],
        ]);

        $price = (float) $data['price'];

        $cart = [
            [
                'product_name' => $data['product_name'],
                'model' => $data['model'],
                'price' => $price,
                'quantity' => 1,
                'configuration' => $data['configuration'] ?? null,
            ],
        ];

        session([
            'cart' => $cart,
            'checkout_prefill' => [
                'customer_name' => $data['name'],
                'customer_email' => $data['email'],
                'customer_phone' => $data['phone'],
            ],
        ]);

        return redirect()->route('checkout.index');
    }
}
