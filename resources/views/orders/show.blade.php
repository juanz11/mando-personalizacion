<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden #{{ $order->order_number }} - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .order-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; }
        .order-card { background: #121418; border: 1px solid #26282c; border-radius: 20px; padding: 40px; max-width: 840px; margin: 0 auto; }
        .order-card h1 { font-size: 1.75rem; margin-bottom: 8px; }
        .subtitle { color: #a1a5ab; margin-bottom: 24px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px; }
        .section { background: #0b0d10; border-radius: 16px; padding: 20px; border: 1px solid #26282c; }
        .section h2 { font-size: 1.1rem; margin-bottom: 14px; }
        .section p { color: #a1a5ab; margin-bottom: 6px; }
        .timeline { border-left: 2px solid #26282c; padding-left: 18px; margin-top: 20px; }
        .timeline-item { position: relative; margin-bottom: 18px; }
        .timeline-item::before { content: ''; position: absolute; left: -25px; top: 4px; width: 10px; height: 10px; border-radius: 50%; background: #4ade80; }
        .track-btn { display: inline-block; margin-top: 12px; padding: 10px 18px; background: #4ade80; color: #000; border-radius: 8px; text-decoration: none; font-weight: 600; }
        .pay-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; background: #14161a; border-radius: 10px; padding: 10px 12px; margin-bottom: 8px; border: 1px solid #26282c; }
        .pay-row span { color: #e5e7eb; font-size: 0.9rem; word-break: break-all; }
        .copy-btn { background: #1f2937; color: #fff; border: 1px solid #374151; border-radius: 8px; padding: 6px 12px; font-size: 0.8rem; cursor: pointer; white-space: nowrap; transition: background 0.2s; }
        .copy-btn:hover { background: #374151; }
        .copy-btn.copied { background: #064e3b; border-color: #4ade80; color: #4ade80; }
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
            <h2>Pago</h2>
            <p style="margin-bottom:12px;"><strong>Método:</strong> {{ $order->payment_method == 'binance' ? 'Binance Pay' : 'Pago Móvil Venezuela' }}</p>
            @if($order->payment_method == 'binance')
                <div class="pay-row">
                    <span>Correo: <code id="binance-email">Javierjbd13@gmail.com</code></span>
                    <button type="button" class="copy-btn" data-copy="Javierjbd13@gmail.com">Copiar</button>
                </div>
            @else
                <div class="pay-row">
                    <span>Teléfono: <code id="pagomovil-phone">04127141909</code></span>
                    <button type="button" class="copy-btn" data-copy="04127141909">Copiar</button>
                </div>
                <div class="pay-row">
                    <span>CI / RIF: <code id="pagomovil-ci">J-508086635</code></span>
                    <button type="button" class="copy-btn" data-copy="J-508086635">Copiar</button>
                </div>
                <div class="pay-row">
                    <span>País: <code id="pagomovil-country">Venezuela</code></span>
                    <button type="button" class="copy-btn" data-copy="Venezuela">Copiar</button>
                </div>
            @endif
            @if($order->payment_receipt)
                <p style="margin-top:14px;"><a href="{{ asset('storage/' . $order->payment_receipt) }}" target="_blank" class="track-btn" style="background:#60a5fa;">Ver comprobante</a></p>
            @endif
        </div>

        <div class="section" style="margin-bottom:24px;">
            <h2>Envío</h2>
            @if($order->tracking_number)
                <p style="color:#4ade80; font-weight:600; margin-bottom:12px;">¡Envío listo!</p>
                <p style="margin-bottom:6px;"><strong>Carrier:</strong> {{ App\Models\Order::$carriers[$order->carrier] ?? $order->carrier }}</p>
                <p style="margin-bottom:12px;"><strong>Número de guía:</strong> {{ $order->tracking_number }}</p>
                @if($order->trackingUrl())
                    <p style="margin-bottom:8px; color:#a1a5ab;">Verifica su llegada aquí:</p>
                    <a href="{{ $order->trackingUrl() }}" target="_blank" class="track-btn">Seguir mi envío</a>
                    <p style="margin-top:10px; word-break:break-all;">
                        <a href="{{ $order->trackingUrl() }}" target="_blank" style="color:#60a5fa; text-decoration:underline;">{{ $order->trackingUrl() }}</a>
                    </p>
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

<script>
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const text = btn.dataset.copy;
            try {
                await navigator.clipboard.writeText(text);
                const original = btn.textContent;
                btn.textContent = '¡Copiado!';
                btn.classList.add('copied');
                setTimeout(() => {
                    btn.textContent = original;
                    btn.classList.remove('copied');
                }, 1500);
            } catch (err) {
                console.error('No se pudo copiar', err);
            }
        });
    });
</script>
</body>
</html>
