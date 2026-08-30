<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden #{{ $order->order_number }} - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .admin-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; }
        .admin-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 32px; max-width: 900px; margin: 0 auto; }
        .admin-card h1 { font-size: 1.75rem; margin-bottom: 8px; }
        .subtitle { color: #a1a5ab; margin-bottom: 24px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px; }
        .section { background: #0b0d10; border-radius: 12px; padding: 20px; }
        .section h2 { font-size: 1.1rem; margin-bottom: 14px; }
        .section p { color: #a1a5ab; margin-bottom: 6px; }
        .form-row { display: flex; gap: 12px; align-items: flex-end; margin-top: 12px; }
        .form-group { flex: 1; }
        .form-group label { display: block; font-size: 0.875rem; margin-bottom: 6px; color: #a1a5ab; }
        .form-group input, .form-group select { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #26282c; background: #0b0d10; color: #fff; }
        .timeline { border-left: 2px solid #26282c; padding-left: 18px; margin-top: 20px; }
        .timeline-item { position: relative; margin-bottom: 18px; }
        .timeline-item::before { content: ''; position: absolute; left: -25px; top: 4px; width: 10px; height: 10px; border-radius: 50%; background: #4ade80; }
        .timeline-item small { color: #a1a5ab; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
        .badge-{{ $order->status }} { background: #001a33; color: #60a5fa; }
        .pay-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; background: #14161a; border-radius: 10px; padding: 10px 12px; margin-bottom: 8px; border: 1px solid #26282c; }
        .pay-row span { color: #e5e7eb; font-size: 0.9rem; word-break: break-all; }
        .copy-btn { background: #1f2937; color: #fff; border: 1px solid #374151; border-radius: 8px; padding: 6px 12px; font-size: 0.8rem; cursor: pointer; white-space: nowrap; transition: background 0.2s; }
        .copy-btn:hover { background: #374151; }
        .copy-btn.copied { background: #064e3b; border-color: #4ade80; color: #4ade80; }
    </style>
</head>
<body>
<div class="admin-page">
    <div class="admin-card">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline" style="display:inline-block; padding:10px 20px; margin-bottom:20px;">← Volver a órdenes</a>
        <h1>Orden #{{ $order->order_number }}</h1>
        <p class="subtitle">Estado: <span class="badge badge-{{ $order->status }}">{{ $order->statusLabel() }}</span></p>

        @if(session('success'))
            <div style="background:#064e3b; color:#34d399; padding:12px 16px; border-radius:8px; margin-bottom:20px;">{{ session('success') }}</div>
        @endif

        @php
            $waMessage = null;
            $waLink = null;
            if ($order->tracking_number) {
                $waMessage = $order->shipping_country === 'US'
                    ? "Hello {$order->customer_name}, your purchase at RTE Custom Controller (Order #{$order->order_number}) has been shipped. You can track it here: " . ($order->trackingUrl() ?? '')
                    : "Hola {$order->customer_name}, tu compra en RTE Custom Controller (Orden #{$order->order_number}) ha sido enviada. Podés verificar el tracking aquí: " . ($order->trackingUrl() ?? '');

                $phone = preg_replace('/\D/', '', $order->customer_phone);
                $phone = ltrim($phone, '0');
                if ($order->shipping_country === 'VE' && !str_starts_with($phone, '58')) {
                    $phone = '58' . $phone;
                } elseif ($order->shipping_country === 'US' && strlen($phone) === 10) {
                    $phone = '1' . $phone;
                }
                $waLink = $phone ? "https://wa.me/{$phone}?text=" . urlencode($waMessage) : "https://wa.me/?text=" . urlencode($waMessage);
            }
        @endphp

        @if(session('tracking_added'))
            <div style="background:#064e3b; color:#34d399; padding:16px; border-radius:8px; margin-bottom:20px;">
                <p style="margin-bottom:12px;"><strong>¡Envío confirmado!</strong> Se envió un correo al cliente. También podés notificarlo por WhatsApp.</p>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    <a href="{{ $waLink }}" target="_blank" class="btn btn-primary" style="background:#25D366; color:#fff; border:none;">📱 Notificar por WhatsApp</a>
                    <button type="button" class="copy-btn" data-copy="{{ $waMessage }}">Copiar mensaje</button>
                </div>
            </div>
        @endif

        <div class="grid">
            <div class="section">
                <h2>Cliente</h2>
                <p><strong>{{ $order->customer_name }}</strong></p>
                <p>{{ $order->customer_email }}</p>
                <p>{{ $order->customer_phone }}</p>
            </div>
            <div class="section">
                <h2>Pago</h2>
                <p style="margin-bottom:12px;"><strong>Método:</strong> {{ $order->payment_method == 'binance' ? 'Binance Pay' : 'Pago Móvil Venezuela' }}</p>
                @if($order->payment_method == 'binance')
                    <div class="pay-row">
                        <span>Correo: <code>Javierjbd13@gmail.com</code></span>
                        <button type="button" class="copy-btn" data-copy="Javierjbd13@gmail.com">Copiar</button>
                    </div>
                @else
                    <div class="pay-row">
                        <span>Teléfono: <code>04127141909</code></span>
                        <button type="button" class="copy-btn" data-copy="04127141909">Copiar</button>
                    </div>
                    <div class="pay-row">
                        <span>CI / RIF: <code>J-508086635</code></span>
                        <button type="button" class="copy-btn" data-copy="J-508086635">Copiar</button>
                    </div>
                    <div class="pay-row">
                        <span>Banco: <code>Banco de Venezuela</code></span>
                        <button type="button" class="copy-btn" data-copy="Banco de Venezuela">Copiar</button>
                    </div>
                @endif
                @if($order->payment_receipt)
                    <p style="margin-top:14px;"><a href="{{ route('receipts.show', ['path' => $order->payment_receipt]) }}" target="_blank" class="track-btn" style="background:#60a5fa;">Ver comprobante</a></p>
                @endif
            </div>

            <div class="section">
                <h2>Envío</h2>
                <p>{{ $order->shipping_address }}</p>
                <p>{{ $order->shipping_city }}, {{ $order->shipping_zip }}</p>
                <p>{{ $order->shipping_country }}</p>
                @if($waLink)
                    <p style="margin-top:14px;"><strong>Tracking:</strong> {{ $order->tracking_number }} ({{ App\Models\Order::$carriers[$order->carrier] ?? $order->carrier }})</p>
                    <p style="margin-top:8px;"><a href="{{ $waLink }}" target="_blank" class="btn btn-primary" style="background:#25D366; color:#fff; border:none;">📱 Notificar por WhatsApp</a></p>
                @endif
            </div>
        </div>

        <div class="section" style="margin-bottom:24px;">
            <h2>Items</h2>
            @foreach($order->items as $item)
                <p>{{ $item->quantity }}x {{ $item->product_name }} ({{ strtoupper($item->model) }}) - ${{ number_format($item->price, 2, ',', '.') }}</p>
                @if(is_array($item->configuration) && !empty($item->configuration['summary']))
                    <p style="color:#a1a5ab; font-size:0.85rem; margin-left:16px;">{{ $item->configuration['summary'] }}</p>
                @endif
            @endforeach
            <p style="margin-top:12px; font-weight:700; color:#fff;">Total: ${{ number_format($order->total, 2, ',', '.') }}</p>
            <p style="margin-top:14px;">
                <a href="{{ route('admin.orders.pdf', $order) }}" target="_blank" rel="noopener noreferrer" onclick="window.open(this.href, '_blank'); return false;" style="display:inline-block; background:#4ade80; color:#000; padding:10px 18px; border-radius:8px; text-decoration:none; font-weight:600;">Ver configuración PDF</a>
            </p>
        </div>

        <div class="section" style="margin-bottom:24px;">
            <h2>Agregar Tracking</h2>
            <form method="POST" action="{{ route('admin.orders.tracking', $order) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group">
                        <label>Carrier</label>
                        <select name="carrier" required>
                            <option value="">Seleccionar</option>
                            @foreach(App\Models\Order::$carriers as $key => $label)
                                <option value="{{ $key }}" {{ $order->carrier == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Número de tracking</label>
                        <input type="text" name="tracking_number" value="{{ $order->tracking_number }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="padding:10px 20px; height:42px;">Guardar y Enviar</button>
                </div>
            </form>
        </div>

        <div class="section" style="margin-bottom:24px;">
            <h2>Actualizar Estado</h2>
            <form method="POST" action="{{ route('admin.orders.status', $order) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="status" required>
                            @foreach(App\Models\Order::$statuses as $key => $label)
                                <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="flex:2;">
                        <label>Descripción</label>
                        <input type="text" name="description" placeholder="Ej. Llegó al centro de distribución">
                    </div>
                    <button type="submit" class="btn btn-outline" style="padding:10px 20px; height:42px;">Actualizar</button>
                </div>
            </form>
        </div>

        <div class="section">
            <h2>Historial de Tracking</h2>
            @forelse($order->trackingUpdates as $update)
                <div class="timeline-item">
                    <strong>{{ ucfirst(str_replace('_', ' ', $update->status)) }}</strong>
                    <p>{{ $update->description }}</p>
                    <small>{{ $update->tracked_at->format('M d, Y H:i') }}</small>
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
