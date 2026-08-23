<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .checkout-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; }
        .checkout-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 32px; max-width: 720px; margin: 0 auto; }
        .checkout-card h1 { font-size: 1.75rem; margin-bottom: 24px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { margin-bottom: 16px; }
        .form-group.wide { grid-column: 1 / -1; }
        .form-group label { display: block; font-size: 0.875rem; margin-bottom: 6px; color: #a1a5ab; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #26282c; background: #0b0d10; color: #fff; }
        .form-group textarea { min-height: 80px; resize: vertical; }
        .summary { background: #0b0d10; border-radius: 12px; padding: 16px; margin-bottom: 24px; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 8px; }
        .summary-total { font-weight: 700; color: #fff; border-top: 1px solid #26282c; padding-top: 12px; margin-top: 12px; }
    </style>
</head>
<body>
<div class="checkout-page">
    <div class="checkout-card">
        <h1>Finalizar Compra</h1>
        <div class="summary">
            @foreach($cart as $item)
                <div class="summary-row">
                    <span>{{ $item['product_name'] }} (x{{ $item['quantity'] ?? 1 }})</span>
                    <span>${{ number_format($item['price'] * ($item['quantity'] ?? 1), 2) }}</span>
                </div>
            @endforeach
            <div class="summary-row summary-total">
                <span>Total</span>
                <span>${{ number_format($total, 2) }}</span>
            </div>
        </div>
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group wide">
                    <label for="customer_name">Nombre completo</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $prefill['customer_name'] ?? $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="customer_email">Email</label>
                    <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email', $prefill['customer_email'] ?? $user->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="customer_phone">Teléfono</label>
                    <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $prefill['customer_phone'] ?? $user->phone ?? '') }}" required>
                </div>
                <div class="form-group wide">
                    <label for="shipping_address">Dirección de envío</label>
                    <textarea id="shipping_address" name="shipping_address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="shipping_city">Ciudad</label>
                    <input type="text" id="shipping_city" name="shipping_city" required>
                </div>
                <div class="form-group">
                    <label for="shipping_zip">ZIP / Código postal</label>
                    <input type="text" id="shipping_zip" name="shipping_zip" required>
                </div>
                <div class="form-group">
                    <label for="shipping_country">País</label>
                    <input type="text" id="shipping_country" name="shipping_country" value="US" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%">Confirmar Compra</button>
        </form>
    </div>
</div>
</body>
</html>
