<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden #{{ $order->order_number }} - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .order-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; }
        .order-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 32px; max-width: 800px; margin: 0 auto; }
        .order-card h1 { font-size: 1.75rem; margin-bottom: 8px; }
        .subtitle { color: #a1a5ab; margin-bottom: 24px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px; }
        .section { background: #0b0d10; border-radius: 12px; padding: 20px; }
        .section h2 { font-size: 1.1rem; margin-bottom: 14px; }
        .section p { color: #a1a5ab; margin-bottom: 6px; }
        .timeline { border-left: 2px solid #26282c; padding-left: 18px; margin-top: 20px; }
        .timeline-item { position: relative; margin-bottom: 18px; }
        .timeline-item::before { content: ''; position: absolute; left: -25px; top: 4px; width: 10px; height: 10px; border-radius: 50%; background: #4ade80; }
        .track-btn { display: inline-block; margin-top: 12px; padding: 10px 18px; background: #4ade80; color: #000; border-radius: 8px; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
<div class="order-page">
    <div class="order-card">
        <h1>Orden #{{ $order->order_number }}</h1>
        <p class="subtitle">Estado: {{ $order->statusLabel() }}</p>

        <div class="grid">
            <div class="section">
                <h2>Detalles de Envío</h2>
                <p>{{ $order->customer_name }}</p>
                <p>{{ $order->shipping_address }}</p>
                <p>{{ $order->shipping_city }}, {{ $order->shipping_zip }}</p>
                <p>{{ $order->shipping_country }}</p>
            </div>
            <div class="section">
                <h2>Resumen</h2>
                @foreach($order->items as $item)
                    <p>{{ $item->quantity }}x {{ $item->product_name }} - ${{ number_format($item->price, 2) }}</p>
                @endforeach
                <p style="margin-top:12px; font-weight:700; color:#fff;">Total: ${{ number_format($order->total, 2) }}</p>
            </div>
        </div>

        <div class="section" style="margin-bottom:24px;">
            <h2>Tracking</h2>
            @if($order->tracking_number)
                <p>Carrier: {{ App\Models\Order::$carriers[$order->carrier] ?? $order->carrier }}</p>
                <p>Número: {{ $order->tracking_number }}</p>
                @if($order->trackingUrl())
                    <a href="{{ $order->trackingUrl() }}" target="_blank" class="track-btn">Seguir Envío</a>
                @endif
            @else
                <p style="color:#a1a5ab;">Todavía no hay un número de tracking asignado.</p>
            @endif
        </div>

        <div class="section">
            <h2>Historial</h2>
            @forelse($order->trackingUpdates as $update)
                <div class="timeline-item">
                    <strong>{{ ucfirst(str_replace('_', ' ', $update->status)) }}</strong>
                    <p>{{ $update->description }}</p>
                    <small style="color:#a1a5ab;">{{ $update->tracked_at->format('M d, Y H:i') }}</small>
                </div>
            @empty
                <p style="color:#a1a5ab;">Sin movimientos aún.</p>
            @endforelse
        </div>
    </div>
</div>
</body>
</html>
