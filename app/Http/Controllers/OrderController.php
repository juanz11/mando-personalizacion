<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->with('trackingUpdates')->latest()->paginate(20);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if (Auth::check()) {
            abort_if($order->user_id !== Auth::id(), 403);
        } else {
            abort_if($order->user_id !== null, 403);
        }

        $order->load('items', 'trackingUpdates');
        return view('orders.show', compact('order'));
    }
}
