<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Órdenes - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .admin-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; }
        .admin-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 32px; max-width: 1200px; margin: 0 auto; }
        .admin-card h1 { font-size: 1.75rem; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { text-align: left; padding: 14px 12px; border-bottom: 1px solid #26282c; }
        th { color: #a1a5ab; font-weight: 500; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
        .badge-pending { background: #3a2e00; color: #ffcc00; }
        .badge-paid { background: #003300; color: #4ade80; }
        .badge-shipped { background: #001a33; color: #60a5fa; }
        .badge-in_transit { background: #1e1b4b; color: #818cf8; }
        .badge-out_for_delivery { background: #3b0764; color: #c084fc; }
        .badge-delivered { background: #064e3b; color: #34d399; }
        .badge-cancelled { background: #3f0000; color: #ff5a5a; }
    </style>
</head>
<body>
<div class="admin-page">
    <div class="admin-card">
        <h1>Panel de Administración - Órdenes</h1>
        <table>
            <thead>
            <tr>
                <th># Orden</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Tracking</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td><span class="badge badge-{{ $order->status }}">{{ $order->statusLabel() }}</span></td>
                    <td>{{ $order->tracking_number ?? '-' }}</td>
                    <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-outline" style="padding:6px 14px; font-size:0.8rem;">Ver</a></td>
                </tr>
            @empty
                <tr><td colspan="7">No hay órdenes aún.</td></tr>
            @endforelse
            </tbody>
        </table>
        <div style="margin-top:24px;">{{ $orders->links() }}</div>
    </div>
</div>
</body>
</html>
