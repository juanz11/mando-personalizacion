<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .checkout-page { min-height: 100vh; background: #0b0d10; padding: 120px 24px 60px; font-family: 'Poppins', sans-serif; }
        .checkout-card { background: #121418; border: 1px solid #26282c; border-radius: 20px; padding: 40px; max-width: 720px; margin: 0 auto; box-shadow: 0 20px 60px rgba(0,0,0,0.4); }
        .checkout-card h1 { font-size: 1.75rem; margin-bottom: 24px; font-weight: 700; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { margin-bottom: 18px; }
        .form-group.wide { grid-column: 1 / -1; }
        .form-group label { display: block; font-size: 0.875rem; margin-bottom: 8px; color: #a1a5ab; font-weight: 500; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #33363c; background: #0b0d10; color: #fff; outline: none; transition: border-color 0.2s; }
        .form-group input:focus, .form-group textarea:focus { border-color: #4ade80; }
        .form-group textarea { min-height: 80px; resize: vertical; }
        .summary { background: #0b0d10; border-radius: 16px; padding: 20px; margin-bottom: 28px; border: 1px solid #26282c; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; color: #a1a5ab; }
        .summary-total { font-weight: 700; color: #fff; border-top: 1px solid #26282c; padding-top: 14px; margin-top: 14px; font-size: 1.1rem; }
        .payment-methods { display: grid; grid-template-columns: 1fr; gap: 14px; margin-top: 10px; }
        .payment-method { border: 1px solid #33363c; border-radius: 16px; padding: 18px; background: #0b0d10; transition: all 0.2s; }
        .payment-method:hover { border-color: #4ade80; }
        .pm-header { display: flex; align-items: flex-start; gap: 14px; cursor: pointer; margin-bottom: 12px; }
        .pm-header input[type="radio"] { -webkit-appearance: none; appearance: none; width: 24px; height: 24px; min-width: 24px; margin: 2px 0 0; border: 2px solid #4ade80; border-radius: 50%; background: transparent; cursor: pointer; position: relative; outline: none; transition: all 0.2s; }
        .pm-header input[type="radio"]:checked { background: #4ade80; }
        .pm-header input[type="radio"]:checked::after { content: ''; position: absolute; top: 50%; left: 50%; width: 10px; height: 10px; background: #0b0d10; border-radius: 50%; transform: translate(-50%, -50%); }
        .pm-header strong { display: block; margin-bottom: 4px; color: #fff; font-size: 1rem; }
        .pm-header small { color: #a1a5ab; display: block; }
        .payment-details { display: flex; flex-direction: column; gap: 10px; }
        .pay-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; background: #14161a; border-radius: 12px; padding: 12px 14px; border: 1px solid #26282c; }
        .pay-row span { color: #e5e7eb; font-size: 0.9rem; word-break: break-all; }
        .pay-row code { color: #4ade80; font-family: inherit; }
        .copy-btn { background: #1f2937; color: #fff; border: 1px solid #374151; border-radius: 8px; padding: 6px 12px; font-size: 0.8rem; cursor: pointer; white-space: nowrap; transition: background 0.2s; }
        .copy-btn:hover { background: #374151; }
        .copy-btn.copied { background: #064e3b; border-color: #4ade80; color: #4ade80; }
        .receipt-note { color: #a1a5ab; font-size: 0.85rem; margin-top: 8px; }
        .file-input { padding: 10px; border: 1px dashed #4ade80; border-radius: 12px; background: #0b0d10; color: #fff; width: 100%; cursor: pointer; }
        .country-switch { display: flex; justify-content: center; gap: 12px; margin-bottom: 24px; }
        .country-btn { display: flex; align-items: center; gap: 8px; padding: 10px 18px; border-radius: 12px; border: 2px solid #33363c; background: #0b0d10; color: #a1a5ab; cursor: pointer; transition: all 0.2s; }
        .country-btn.active { border-color: #4ade80; color: #fff; background: rgba(74, 222, 128, 0.1); }
        .country-btn .flag { font-size: 1.25rem; }
    </style>
</head>
<body>
<div class="checkout-page">
    <div class="checkout-card">
        <h1 data-i18n="checkout_title">Finalizar Compra</h1>
        <div class="summary">
            @foreach($cart as $item)
                <div class="summary-row">
                    <span>{{ $item['product_name'] }} (x{{ $item['quantity'] ?? 1 }})</span>
                    <span>${{ number_format($item['price'] * ($item['quantity'] ?? 1), 2, ',', '.') }}</span>
                </div>
            @endforeach
            <div class="summary-row summary-total">
                <span data-i18n="total">Total</span>
                <span>${{ number_format($total, 2, ',', '.') }}</span>
            </div>
        </div>
        <form method="POST" action="{{ route('checkout.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-group wide">
                    <label for="customer_name" data-i18n="name_label">Nombre completo</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $prefill['customer_name'] ?? $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="customer_email" data-i18n="email_label">Email</label>
                    <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email', $prefill['customer_email'] ?? $user->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="customer_phone" data-i18n="phone_label">Teléfono</label>
                    <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $prefill['customer_phone'] ?? $user->phone ?? '') }}" required>
                </div>
                <div class="form-group wide">
                    <label for="shipping_address" data-i18n="address_label">Dirección de envío</label>
                    <textarea id="shipping_address" name="shipping_address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="shipping_city" data-i18n="city_label">Ciudad</label>
                    <input type="text" id="shipping_city" name="shipping_city" required>
                </div>
                <div class="form-group">
                    <label for="shipping_state" data-i18n="state_label">Estado / Provincia</label>
                    <select id="shipping_state" name="shipping_state" required>
                        <option value="" data-i18n="select_state">Seleccioná tu estado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="shipping_zip" data-i18n="zip_label">ZIP / Código postal</label>
                    <input type="text" id="shipping_zip" name="shipping_zip" required>
                </div>
                <input type="hidden" id="shipping_country" name="shipping_country" value="VE">

                <div class="country-switch" style="grid-column: 1 / -1;">
                    <button type="button" class="country-btn active" data-country="VE">
                        <span class="flag">🇻🇪</span>
                        <span>Venezuela</span>
                    </button>
                    <button type="button" class="country-btn" data-country="US">
                        <span class="flag">🇺🇸</span>
                        <span>United States</span>
                    </button>
                </div>
            </div>

            <div class="form-group wide">
                <label data-i18n="payment_label">Método de pago</label>
                <div id="payment-methods-ve" class="payment-methods">
                    <div class="payment-method">
                        <label class="pm-header" for="payment_binance">
                            <input type="radio" id="payment_binance" name="payment_method" value="binance" required {{ old('payment_method') == 'binance' ? 'checked' : '' }}>
                            <div>
                                <strong data-i18n="binance_title">Binance Pay</strong>
                                <small data-i18n="binance_desc">Realizá el pago a este correo y subí el comprobante.</small>
                            </div>
                        </label>
                        <div class="payment-details">
                            <div class="pay-row">
                                <span>Correo: <code>Javierjbd13@gmail.com</code></span>
                                <button type="button" class="copy-btn" data-i18n="copy" data-copy="Javierjbd13@gmail.com">Copiar</button>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <label class="pm-header" for="payment_pagomovil">
                            <input type="radio" id="payment_pagomovil" name="payment_method" value="pago_movil" required {{ old('payment_method') == 'pago_movil' ? 'checked' : '' }}>
                            <div>
                                <strong data-i18n="pagomovil_title">Pago Móvil Venezuela</strong>
                                <small data-i18n="pagomovil_desc">Usá estos datos y subí el capture del pago.</small>
                            </div>
                        </label>
                        <div class="payment-details">
                            <div class="pay-row">
                                <span>Teléfono: <code>04127141909</code></span>
                                <button type="button" class="copy-btn" data-i18n="copy" data-copy="04127141909">Copiar</button>
                            </div>
                            <div class="pay-row">
                                <span>CI / RIF: <code>J-508086635</code></span>
                                <button type="button" class="copy-btn" data-i18n="copy" data-copy="J-508086635">Copiar</button>
                            </div>
                            <div class="pay-row">
                                <span>Banco: <code>Banco de Venezuela</code></span>
                                <button type="button" class="copy-btn" data-i18n="copy" data-copy="Banco de Venezuela">Copiar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="payment-methods-us" class="payment-methods" style="display: none;">
                    <div class="payment-method">
                        <div class="pm-header">
                            <div>
                                <strong data-i18n="stripe_title">Stripe (tarjeta de prueba)</strong>
                                <small data-i18n="stripe_desc">Pagá con tarjeta usando Stripe en modo prueba.</small>
                            </div>
                        </div>
                        <div class="payment-details">
                            <div id="card-element" class="pay-row" style="background:#fff; color:#000; padding:10px 14px; border-radius:8px; min-height:40px;"></div>
                            <div id="card-errors" role="alert" style="color:#ff6b6b; font-size:0.85rem; margin-top:6px;"></div>
                            <input type="hidden" name="payment_method" value="stripe" disabled>
                            <input type="hidden" name="stripe_token" id="stripe_token" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group wide" id="receipt-group">
                <label for="payment_receipt" data-i18n="receipt_label">Comprobante de pago (captura)</label>
                <input type="file" id="payment_receipt" name="payment_receipt" accept="image/*,.pdf" class="file-input" required>
                <p class="receipt-note" data-i18n="receipt_note">Subí el capture o comprobante del pago realizado. Sin él no podremos procesar tu orden.</p>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%; padding:14px; border-radius:12px; font-size:1rem;" data-i18n="submit_button">Confirmar Compra</button>
        </form>
    </div>
</div>

<script>
    const i18n = {
        es: {
            checkout_title: 'Finalizar Compra',
            name_label: 'Nombre completo',
            email_label: 'Email',
            phone_label: 'Teléfono',
            address_label: 'Dirección de envío',
            city_label: 'Ciudad',
            state_label: 'Estado / Provincia',
            select_state: 'Seleccioná tu estado',
            zip_label: 'ZIP / Código postal',
            payment_label: 'Método de pago',
            binance_title: 'Binance Pay',
            binance_desc: 'Realizá el pago a este correo y subí el comprobante.',
            pagomovil_title: 'Pago Móvil Venezuela',
            pagomovil_desc: 'Usá estos datos y subí el capture del pago.',
            stripe_title: 'Stripe (tarjeta de prueba)',
            stripe_desc: 'Pagá con tarjeta usando Stripe en modo prueba.',
            receipt_label: 'Comprobante de pago (captura)',
            receipt_note: 'Subí el capture o comprobante del pago realizado. Sin él no podremos procesar tu orden.',
            submit_button: 'Confirmar Compra',
            copy: 'Copiar',
            copied: '¡Copiado!',
            total: 'Total'
        },
        en: {
            checkout_title: 'Checkout',
            name_label: 'Full name',
            email_label: 'Email',
            phone_label: 'Phone',
            address_label: 'Shipping address',
            city_label: 'City',
            state_label: 'State / Province',
            select_state: 'Select your state',
            zip_label: 'ZIP / Postal code',
            payment_label: 'Payment method',
            binance_title: 'Binance Pay',
            binance_desc: 'Send payment to this email and upload the receipt.',
            pagomovil_title: 'Pago Móvil Venezuela',
            pagomovil_desc: 'Use these details and upload the payment screenshot.',
            stripe_title: 'Stripe (test card)',
            stripe_desc: 'Pay by card using Stripe test mode.',
            receipt_label: 'Payment receipt (screenshot)',
            receipt_note: 'Upload the payment screenshot or receipt. We cannot process your order without it.',
            submit_button: 'Confirm Purchase',
            copy: 'Copy',
            copied: 'Copied!',
            total: 'Total'
        }
    };

    const states = {
        VE: [
            'Amazonas', 'Anzoátegui', 'Apure', 'Aragua', 'Barinas', 'Bolívar', 'Carabobo', 'Cojedes', 'Delta Amacuro', 'Distrito Capital', 'Falcón', 'Guárico', 'Lara', 'Mérida', 'Miranda', 'Monagas', 'Nueva Esparta', 'Portuguesa', 'Sucre', 'Táchira', 'Trujillo', 'Vargas', 'Yaracuy', 'Zulia'
        ],
        US: [
            'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ]
    };

    function setLang(lang) {
        document.documentElement.lang = lang === 'en' ? 'en' : 'es';
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.dataset.i18n;
            if (i18n[lang] && i18n[lang][key]) {
                el.textContent = i18n[lang][key];
            }
        });
    }

    const countrySelect = document.getElementById('shipping_country');
    const countryBtns = document.querySelectorAll('.country-btn');
    const veMethods = document.getElementById('payment-methods-ve');
    const usMethods = document.getElementById('payment-methods-us');
    const usInputs = usMethods.querySelectorAll('input[name="payment_method"], input[name="stripe_token"]');
    const veRadios = veMethods.querySelectorAll('input[name="payment_method"]');
    const receiptGroup = document.getElementById('receipt-group');
    const receiptInput = document.getElementById('payment_receipt');
    const stateSelect = document.getElementById('shipping_state');
    const storedCountry = localStorage.getItem('rte_country') || 'VE';

    function setCountry(country) {
        countrySelect.value = country;
        localStorage.setItem('rte_country', country);

        const lang = country === 'US' ? 'en' : 'es';
        setLang(lang);

        countryBtns.forEach(btn => {
            btn.classList.toggle('active', btn.dataset.country === country);
        });

        stateSelect.innerHTML = `<option value="">${i18n[lang].select_state}</option>`;
        states[country].forEach(state => {
            const option = document.createElement('option');
            option.value = state;
            option.textContent = state;
            stateSelect.appendChild(option);
        });

        if (country === 'US') {
            veMethods.style.display = 'none';
            usMethods.style.display = 'grid';
            veRadios.forEach(r => r.disabled = true);
            usInputs.forEach(i => i.disabled = false);
            receiptGroup.style.display = 'none';
            receiptInput.disabled = true;
            receiptInput.required = false;
        } else {
            veMethods.style.display = 'grid';
            usMethods.style.display = 'none';
            veRadios.forEach(r => r.disabled = false);
            usInputs.forEach(i => i.disabled = true);
            receiptGroup.style.display = 'block';
            receiptInput.disabled = false;
            receiptInput.required = true;
        }
    }

    countryBtns.forEach(btn => {
        btn.addEventListener('click', () => setCountry(btn.dataset.country));
    });

    setCountry(storedCountry);

    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            event.preventDefault();
            event.stopPropagation();
            const text = btn.dataset.copy;
            const lang = countrySelect.value === 'US' ? 'en' : 'es';
            try {
                await navigator.clipboard.writeText(text);
                const original = i18n[lang][btn.dataset.i18n] || 'Copiar';
                btn.textContent = i18n[lang].copied;
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

    @if($stripeKey)
    const stripe = Stripe('{{ $stripeKey }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        const displayError = document.getElementById('card-errors');
        displayError.textContent = event.error ? event.error.message : '';
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        if (countrySelect.value !== 'US') return;
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                document.getElementById('card-errors').textContent = result.error.message;
            } else {
                document.getElementById('stripe_token').value = result.token.id;
                form.submit();
            }
        });
    });
    @endif
</script>
</body>
</html>
