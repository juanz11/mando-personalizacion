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
        .payment-methods { display: flex; flex-direction: column; gap: 12px; margin-top: 8px; }
        .payment-method { border: 1px solid #26282c; border-radius: 12px; padding: 14px; cursor: pointer; background: #0b0d10; }
        .payment-method input { margin-right: 10px; }
        .payment-method strong { display: block; margin-bottom: 4px; }
        .payment-method small { color: #a1a5ab; }
        .receipt-note { color: #a1a5ab; font-size: 0.8rem; margin-top: 6px; }
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
        <form method="POST" action="{{ route('checkout.store') }}" enctype="multipart/form-data">
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

            <div class="form-group wide">
                <label>Método de pago</label>
                <div class="payment-methods">
                    <label class="payment-method" for="payment_binance">
                        <input type="radio" id="payment_binance" name="payment_method" value="binance" required {{ old('payment_method') == 'binance' ? 'checked' : '' }}>
                        <strong>Binance Pay</strong>
                        <small>Correo: Javierjbd13@gmail.com</small>
                    </label>
                    <label class="payment-method" for="payment_pagomovil">
                        <input type="radio" id="payment_pagomovil" name="payment_method" value="pago_movil" required {{ old('payment_method') == 'pago_movil' ? 'checked' : '' }}>
                        <strong>Pago Móvil Venezuela</strong>
                        <small>Teléfono: 04127141909 · CI: J-508086635 · País: Venezuela</small>
                    </label>
                </div>
            </div>

            <div class="form-group wide">
                <label for="payment_receipt">Comprobante de pago (captura)</label>
                <input type="file" id="payment_receipt" name="payment_receipt" accept="image/*,.pdf" required>
                <p class="receipt-note">Subí el capture o comprobante del pago realizado.</p>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">Confirmar Compra</button>
        </form>
    </div>
</div>
</body>
</html>
