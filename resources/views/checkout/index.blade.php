<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .checkout-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; font-family: 'Poppins', sans-serif; }
        .checkout-card { background: #121418; border: 1px solid #26282c; border-radius: 20px; padding: 40px; max-width: 720px; margin: 0 auto; box-shadow: 0 20px 60px rgba(0,0,0,0.4); }
        .checkout-card h1 { font-size: 1.75rem; margin-bottom: 24px; font-weight: 700; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { margin-bottom: 18px; }
        .form-group.wide { grid-column: 1 / -1; }
        .form-group label { display: block; font-size: 0.875rem; margin-bottom: 8px; color: #a1a5ab; font-weight: 500; }
        .form-group input, .form-group textarea { width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #33363c; background: #0b0d10; color: #fff; outline: none; transition: border-color 0.2s; }
        .form-group input:focus, .form-group textarea:focus { border-color: #4ade80; }
        .form-group textarea { min-height: 80px; resize: vertical; }
        .summary { background: #0b0d10; border-radius: 16px; padding: 20px; margin-bottom: 28px; border: 1px solid #26282c; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; color: #a1a5ab; }
        .summary-total { font-weight: 700; color: #fff; border-top: 1px solid #26282c; padding-top: 14px; margin-top: 14px; font-size: 1.1rem; }
        .payment-methods { display: grid; grid-template-columns: 1fr; gap: 14px; margin-top: 10px; }
        .payment-method { display: flex; align-items: flex-start; gap: 12px; border: 1px solid #33363c; border-radius: 16px; padding: 18px; cursor: pointer; background: #0b0d10; transition: all 0.2s; }
        .payment-method:hover { border-color: #4ade80; }
        .payment-method input { margin-top: 4px; accent-color: #4ade80; }
        .payment-method .pm-body { flex: 1; }
        .payment-method strong { display: block; margin-bottom: 4px; color: #fff; }
        .payment-method small { color: #a1a5ab; display: block; margin-bottom: 4px; }
        .payment-details { margin-top: 10px; display: flex; flex-direction: column; gap: 8px; }
        .pay-row { display: flex; justify-content: space-between; align-items: center; background: #14161a; border-radius: 10px; padding: 10px 12px; border: 1px solid #26282c; }
        .pay-row span { color: #e5e7eb; font-size: 0.9rem; word-break: break-all; }
        .pay-row code { color: #4ade80; font-family: inherit; }
        .copy-btn { background: #1f2937; color: #fff; border: 1px solid #374151; border-radius: 8px; padding: 6px 12px; font-size: 0.8rem; cursor: pointer; white-space: nowrap; transition: background 0.2s; }
        .copy-btn:hover { background: #374151; }
        .copy-btn.copied { background: #064e3b; border-color: #4ade80; color: #4ade80; }
        .receipt-note { color: #a1a5ab; font-size: 0.85rem; margin-top: 8px; }
        .file-input { padding: 10px; border: 1px dashed #4ade80; border-radius: 12px; background: #0b0d10; color: #fff; width: 100%; cursor: pointer; }
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
                        <div class="pm-body">
                            <strong>Binance Pay</strong>
                            <small>Realizá el pago a este correo y subí el comprobante.</small>
                            <div class="payment-details">
                                <div class="pay-row">
                                    <span>Correo: <code id="binance-email">Javierjbd13@gmail.com</code></span>
                                    <button type="button" class="copy-btn" data-copy="Javierjbd13@gmail.com" data-label="Correo">Copiar</button>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="payment-method" for="payment_pagomovil">
                        <input type="radio" id="payment_pagomovil" name="payment_method" value="pago_movil" required {{ old('payment_method') == 'pago_movil' ? 'checked' : '' }}>
                        <div class="pm-body">
                            <strong>Pago Móvil Venezuela</strong>
                            <small>Usá los siguientes datos y subí el capture del pago.</small>
                            <div class="payment-details">
                                <div class="pay-row">
                                    <span>Teléfono: <code id="pagomovil-phone">04127141909</code></span>
                                    <button type="button" class="copy-btn" data-copy="04127141909" data-label="Teléfono">Copiar</button>
                                </div>
                                <div class="pay-row">
                                    <span>CI / RIF: <code id="pagomovil-ci">J-508086635</code></span>
                                    <button type="button" class="copy-btn" data-copy="J-508086635" data-label="CI">Copiar</button>
                                </div>
                                <div class="pay-row">
                                    <span>País: <code id="pagomovil-country">Venezuela</code></span>
                                    <button type="button" class="copy-btn" data-copy="Venezuela" data-label="País">Copiar</button>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="form-group wide">
                <label for="payment_receipt">Comprobante de pago (captura)</label>
                <input type="file" id="payment_receipt" name="payment_receipt" accept="image/*,.pdf" class="file-input" required>
                <p class="receipt-note">Subí el capture o comprobante del pago realizado. Sin él no podremos procesar tu orden.</p>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%; padding:14px; border-radius:12px; font-size:1rem;">Confirmar Compra</button>
        </form>
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
