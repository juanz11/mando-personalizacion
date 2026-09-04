<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'model' => ['required', 'in:ps5,xbox'],
            'price' => ['required', 'numeric', 'min:0'],
            'configuration' => ['nullable', 'string'],
        ]);

        $user = Auth::user();
        $price = round((float) $data['price'], 2);

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
            'checkout_prefill' => $user ? [
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'customer_phone' => $user->phone,
            ] : [],
        ]);

        return redirect()->route('checkout.index');
    }
}
