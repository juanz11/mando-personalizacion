<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\TrackingUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(20);

        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'paid' => Order::where('status', 'paid')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'revenue' => round(Order::sum('total'), 2),
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    public function show(Order $order)
    {
        $order->load('user', 'items', 'trackingUpdates');
        return view('admin.orders.show', compact('order'));
    }

    public function pdf(Order $order)
    {
        $order->load('items');
        $item = $order->items->first();
        $rawConfig = $item?->configuration ?? [];

        if (is_string($rawConfig)) {
            $rawConfig = json_decode($rawConfig, true) ?: [];
        }

        $config = is_array($rawConfig) ? $rawConfig : [];
        $model = $config['model'] ?? ($item?->model ?? 'ps5');

        $frontLayers = $config['front'] ?? [];
        $backLayers = $config['back'] ?? [];

        if (empty($frontLayers) && empty($backLayers)) {
            return back()->with('error', 'No hay imágenes de configuración para esta orden.');
        }

        return view('admin.orders.config', [
            'order' => $order,
            'config' => $config,
            'model' => $model,
            'frontLayers' => $frontLayers,
            'backLayers' => $backLayers,
        ]);
    }

    public function updateTracking(Request $request, Order $order)
    {
        $data = $request->validate([
            'carrier' => ['required', 'in:usps,ups,fedex'],
            'tracking_number' => ['required', 'string', 'max:255'],
        ]);

        $order->update([
            'carrier' => $data['carrier'],
            'tracking_number' => $data['tracking_number'],
            'status' => 'shipped',
            'shipped_at' => now(),
        ]);

        TrackingUpdate::create([
            'order_id' => $order->id,
            'status' => 'shipped',
            'description' => 'La orden ha sido enviada y el transportista recibió el paquete.',
            'location' => 'Centro de distribución',
            'tracked_at' => now(),
        ]);

        Mail::to($order->customer_email)->send(new OrderShipped($order));

        return back()->with('success', 'Tracking agregado y email enviado.')->with('tracking_added', true);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,paid,shipped,in_transit,out_for_delivery,delivered,cancelled'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
        ]);

        $order->update(['status' => $data['status']]);

        if (in_array($data['status'], ['delivered', 'out_for_delivery', 'in_transit'], true)) {
            $order->update([
                'delivered_at' => $data['status'] === 'delivered' ? now() : $order->delivered_at,
            ]);
        }

        TrackingUpdate::create([
            'order_id' => $order->id,
            'status' => $data['status'],
            'description' => $data['description'] ?? 'Estado actualizado manualmente.',
            'location' => $data['location'] ?? null,
            'tracked_at' => now(),
        ]);

        return back()->with('success', 'Estado de envío actualizado.');
    }
}
