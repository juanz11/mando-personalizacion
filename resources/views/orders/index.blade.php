<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Órdenes - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .orders-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; }
        .orders-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 32px; max-width: 900px; margin: 0 auto; }
        .orders-card h1 { font-size: 1.75rem; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { text-align: left; padding: 14px 12px; border-bottom: 1px solid #26282c; }
        th { color: #a1a5ab; font-weight: 500; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
    </style>
</head>
<body>
<div class="orders-page">
    <div class="orders-card">
        <h1>Mis Órdenes</h1>
        <table>
            <thead>
            <tr>
                <th># Orden</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Tracking</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td><span class="badge" style="background:#001a33; color:#60a5fa;">{{ $order->statusLabel() }}</span></td>
                    <td>{{ $order->tracking_number ?? '-' }}</td>
                    <td><a href="{{ route('orders.show', $order) }}" class="btn btn-outline" style="padding:6px 14px; font-size:0.8rem;">Ver</a></td>
                </tr>
            @empty
                <tr><td colspan="6">No tenés órdenes aún.</td></tr>
            @endforelse
            </tbody>
        </table>
        <div style="margin-top:24px;">{{ $orders->links() }}</div>
    </div>
</div>
</body>
</html>
