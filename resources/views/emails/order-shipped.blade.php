<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu pedido fue enviado - RTE Custom Controller</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #0b0d10; color: #f5f7fa; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; background: #121418; padding: 32px; border-radius: 16px; }
        h1 { color: #4ade80; }
        .btn { display: inline-block; padding: 14px 24px; background: #4ade80; color: #000; text-decoration: none; border-radius: 8px; font-weight: 600; margin-top: 16px; }
        p { color: #a1a5ab; }
    </style>
</head>
<body>
<div class="container">
    <h1>¡Tu mando está en camino!</h1>
    <p>Hola {{ $order->customer_name }},</p>
    <p>Tu pedido <strong>{{ $order->order_number }}</strong> fue enviado.</p>
    <p><strong>Carrier:</strong> {{ App\Models\Order::$carriers[$order->carrier] ?? $order->carrier }}</p>
    <p><strong>Número de guía:</strong> {{ $order->tracking_number }}</p>
    @if($trackingUrl)
        <a href="{{ $trackingUrl }}" class="btn">Seguir mi Envío</a>
    @endif
    <p style="margin-top:24px;">Gracias por confiar en RTE Custom Controller.</p>
</div>
</body>
</html>
