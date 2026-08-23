<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu compra ha sido confirmada - RTE Custom Controller</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #0b0d10; color: #f5f7fa; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; background: #121418; padding: 32px; border-radius: 16px; }
        h1 { color: #4ade80; }
        .btn { display: inline-block; padding: 14px 24px; background: #4ade80; color: #000; text-decoration: none; border-radius: 8px; font-weight: 600; margin-top: 12px; }
        .link { color: #4ade80; word-break: break-all; }
        p { color: #a1a5ab; line-height: 1.6; }
        .box { background: #0b0d10; border: 1px solid #26282c; border-radius: 12px; padding: 18px; margin: 18px 0; }
        .box p { color: #e5e7eb; margin: 4px 0; }
        .footer { margin-top: 24px; color: #6b7280; font-size: 0.85rem; }
    </style>
</head>
<body>
<div class="container">
    <h1>¡Tu compra ha sido confirmada!</h1>
    <p>Hola {{ $order->customer_name }},</p>
    <p>Tu pedido <strong>#{{ $order->order_number }}</strong> ya fue enviado. A continuación te dejamos los datos de envío y el enlace directo para que puedas verificar el estado de tu paquete.</p>

    <div class="box">
        <p><strong>Carrier:</strong> {{ App\Models\Order::$carriers[$order->carrier] ?? $order->carrier }}</p>
        <p><strong>Número de guía:</strong> {{ $order->tracking_number }}</p>
        <p><strong>Dirección:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Ciudad:</strong> {{ $order->shipping_city }}, {{ $order->shipping_zip }}</p>
        <p><strong>País:</strong> {{ $order->shipping_country }}</p>
    </div>

    @if($trackingUrl)
        <p><strong>Verifica el estado de tu envío aquí:</strong></p>
        <a href="{{ $trackingUrl }}" class="btn">Seguir mi envío</a>
        <p style="margin-top:12px;"><a href="{{ $trackingUrl }}" class="link">{{ $trackingUrl }}</a></p>
    @endif

    <p class="footer">Gracias por confiar en RTE Custom Controller.</p>
</div>
</body>
</html>
