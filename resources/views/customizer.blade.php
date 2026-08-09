<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIEM GAMING | Personaliza tu Mando {{ $model === 'xbox' ? 'XBOX' : 'PS5' }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body data-model="{{ $model }}">
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('LOGO ROJO/LOGO ROJO.png') }}" alt="DIEM GAMING" width="120" height="60">
            </a>
            <nav class="nav" id="mainNav">
                <a href="{{ url('/') }}" class="nav-link">INICIO</a>
                <a href="{{ url('/#plataformas') }}" class="nav-link">PLATAFORMAS</a>
                <a href="{{ url('/#features') }}" class="nav-link">CARACTERÍSTICAS</a>
            </nav>
            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">
                <svg viewBox="0 0 24 24" width="24" height="24">
                    <path fill="currentColor" d="M3 18h18v-2H3zm0-5h18v-2H3zm0-7v2h18V6z"/>
                </svg>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Controller Display Area -->
            <div class="controller-area">
                <div class="back-button">
                    <a href="{{ url('/') }}" class="back-link">
                        <svg viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor" d="M11.67 3.87 9.9 2.1 0 12l9.9 9.9 1.77-1.77L3.54 12z"/>
                        </svg>
                        Elegir otro modelo
                    </a>
                    <div class="platform-switch">
                        <a href="/ps5" class="platform-switch-btn {{ $model === 'ps5' ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 12h.01M6 15h.01M17.5 9h.01M14.5 12h.01M2 12c0-3.5 1-6 3-6h14c2 0 3 2.5 3 6s-1 8-4 8c-1.5 0-2-1.5-3-3H9c-1 1.5-1.5 3-3 3-3 0-4-4.5-4-8Z"/>
                            </svg>
                            <span>PS5</span>
                        </a>
                        <a href="/xbox" class="platform-switch-btn {{ $model === 'xbox' ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M8 9c1.5 2 2.5 3 4 3s2.5-1 4-3M6 18c1.5-2.5 3.5-4 6-4s4.5 1.5 6 4"/>
                            </svg>
                            <span>XBOX</span>
                        </a>
                    </div>
                </div>
                
                <div class="controller-display">
                    <div class="controller-front">
                        <div class="controller-layers" id="controllerLayers">
                            <!-- Imagen base del mando -->
                            <img id="baseImage" src="https://customizer.diemgaming.com.ar/{{ $model }}/base.png" alt="Base {{ $model === 'xbox' ? 'Xbox' : 'PS5' }} Controller" class="controller-layer base-layer">
                            
                            <!-- Capas de colores para cada parte (PS5) -->
                            <img id="frontShellLayer" src="" alt="Front Shell" class="controller-layer color-layer" style="display: none;">
                            <img id="trimLayer" src="" alt="Trim" class="controller-layer color-layer" style="display: none;">
                            <img id="actionButtonsLayer" src="" alt="Action Buttons" class="controller-layer color-layer" style="display: none;">
                            <img id="dpadLayer" src="" alt="D-pad" class="controller-layer color-layer" style="display: none;">
                            <img id="touchpadLayer" src="" alt="Touchpad" class="controller-layer color-layer" style="display: none;">
                            <img id="sticksLayer" src="" alt="Sticks" class="controller-layer color-layer" style="display: none;">
                            <img id="ringsLayer" src="" alt="Rings" class="controller-layer color-layer" style="display: none;">
                            <img id="logoLayer" src="" alt="Logo" class="controller-layer color-layer" style="display: none;">
                            <img id="backPanelLayer" src="" alt="Back Panel" class="controller-layer color-layer" style="display: none;">
                            <img id="digitalTriggersLayer" src="" alt="Digital Triggers" class="controller-layer color-layer" style="display: none;">
                            <img id="digitalButtonsLayer" src="" alt="Digital Buttons" class="controller-layer color-layer" style="display: none;">
                            <img id="halfEffectLayer" src="" alt="Half Effect" class="controller-layer color-layer" style="display: none;">
                            <img id="paddlesLayer" src="" alt="Paddles" class="controller-layer color-layer" style="display: none;">
                        </div>
                    </div>
                </div>
                
                <div class="rotate-button">
                    <button class="rotate-btn" id="rotateBtn">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="m21.58 16.09-1.09-7.66C20.21 6.46 18.52 5 16.53 5H7.47C5.48 5 3.79 6.46 3.51 8.43l-1.09 7.66C2.2 17.63 3.39 19 4.94 19c.68 0 1.32-.27 1.8-.75L9 16h6l2.25 2.25c.48.48 1.13.75 1.8.75 1.56 0 2.75-1.37 2.53-2.91M11 11H9v2H8v-2H6v-1h2V8h1v2h2zm4-1c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m2 3c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1"/>
                        </svg>
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="m19 8-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Customization Panel -->
            <div class="customization-panel">
                <div class="price-section">
                    <h3 class="price" id="totalPrice">$ 298.000,00</h3>
                    <button type="button" class="order-btn" id="orderBtn">
                        Cotizar
                        <svg viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor" d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2m-5 12H9v-2h6zm5-7H4V4l16-.02z"/>
                        </svg>
                    </button>
                </div>

                <!-- Tabs Navigation -->
                <div class="tabs-nav" id="tabsNav">
                    <button class="tab-btn active" data-tab="frontShell">
                        <img src="https://customizer.diemgaming.com.ar/ps5/front-shell-panel/front.png" alt="Front Shell">
                    </button>
                    <button class="tab-btn" data-tab="trim">
                        <img src="https://customizer.diemgaming.com.ar/ps5/trim/trim.png" alt="Trim">
                    </button>
                    <button class="tab-btn" data-tab="actionButtons">
                        <img src="https://customizer.diemgaming.com.ar/ps5/action-buttons/front.png" alt="Action Buttons">
                    </button>
                    <button class="tab-btn" data-tab="dpad">
                        <img src="https://customizer.diemgaming.com.ar/ps5/d-pad/front.png" alt="D-pad">
                    </button>
                    <button class="tab-btn" data-tab="touchpad">
                        <img src="https://customizer.diemgaming.com.ar/ps5/touchpad/front.png" alt="Touchpad">
                    </button>
                    <button class="tab-btn" data-tab="sticks">
                        <img src="https://customizer.diemgaming.com.ar/ps5/sticks/front.png" alt="Sticks">
                    </button>
                    <button class="tab-btn" data-tab="rings">
                        <img src="https://customizer.diemgaming.com.ar/ps5/rings/front.png" alt="Rings">
                    </button>
                    <button class="tab-btn" data-tab="logo">
                        <img src="https://customizer.diemgaming.com.ar/ps5/logo/front.png" alt="Logo">
                    </button>
                </div>

                <!-- Tab Content -->
                <div class="tab-content">
                    <h4 class="tab-title" id="tabTitle">Front Shell Panel</h4>
                    
                    <!-- Color Options -->
                    <div class="color-options" id="colorOptions">
                        <!-- Se llenará dinámicamente con JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>Copyright {{ date('Y') }} © <strong>DIEM GAMING</strong>. Todos los derechos reservados.</p>
            <p>Desarrollado por <a href="#" target="_blank">Daayi</a></p>
        </div>
    </footer>

    <!-- Order / Quote Modal -->
    <div class="modal-overlay" id="orderModalOverlay">
        <div class="modal" id="orderModal" role="dialog" aria-modal="true" aria-labelledby="orderModalTitle">
            <button type="button" class="modal-close" id="orderModalClose" aria-label="Cerrar">
                <svg viewBox="0 0 24 24" width="20" height="20">
                    <path fill="currentColor" d="M18.3 5.71 12 12l6.3 6.29-1.41 1.42L10.59 13.4 4.3 19.7l-1.41-1.41L9.17 12 2.89 5.71 4.3 4.29l6.29 6.3 6.29-6.3z"/>
                </svg>
            </button>

            <!-- Form view -->
            <div class="modal-body" id="orderModalForm">
                <span class="modal-eyebrow">Resumen de tu pedido</span>
                <h3 id="orderModalTitle">Confirmá tu cotización</h3>

                <div class="modal-quote">
                    <span>Total estimado</span>
                    <strong id="modalQuotePrice">$ 0,00</strong>
                </div>

                <form id="orderForm" class="order-form" novalidate>
                    <div class="form-row">
                        <label for="orderName">Nombre completo</label>
                        <input type="text" id="orderName" name="name" required placeholder="Tu nombre y apellido">
                    </div>

                    <div class="form-row-group">
                        <div class="form-row">
                            <label for="orderEmail">Correo electrónico</label>
                            <input type="email" id="orderEmail" name="email" required placeholder="tu@email.com">
                        </div>
                        <div class="form-row">
                            <label for="orderPhone">Teléfono</label>
                            <input type="tel" id="orderPhone" name="phone" required placeholder="+54 9 11 1234 5678">
                        </div>
                    </div>

                    <div class="form-row">
                        <label>Método de pago</label>
                        <div class="payment-methods" id="paymentMethods">
                            <button type="button" class="payment-method-btn active" data-method="transferencia">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 10h18M5 10V7l7-3 7 3v3M5 10v9M19 10v9M9 14v3M15 14v3M3 21h18"/>
                                </svg>
                                <span>Transferencia</span>
                            </button>
                            <button type="button" class="payment-method-btn" data-method="pago-movil">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/>
                                </svg>
                                <span>Pago Móvil</span>
                            </button>
                            <button type="button" class="payment-method-btn" data-method="paypal">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 15h4.5a4 4 0 0 0 0-8H8L6 19"/><path d="M11 11h4.5a4 4 0 0 1 0 8H10"/>
                                </svg>
                                <span>PayPal</span>
                            </button>
                        </div>
                        <input type="hidden" id="orderPaymentMethod" name="payment_method" value="transferencia">
                    </div>

                    <!-- Dynamic fields per payment method -->
                    <div class="payment-fields" data-fields-for="transferencia">
                        <div class="form-row-group">
                            <div class="form-row">
                                <label for="bankName">Banco emisor</label>
                                <input type="text" id="bankName" name="bank_name" placeholder="Ej: Banco Galicia">
                            </div>
                            <div class="form-row">
                                <label for="transferRef">N° de comprobante</label>
                                <input type="text" id="transferRef" name="transfer_reference" placeholder="Número de operación">
                            </div>
                        </div>
                    </div>

                    <div class="payment-fields" data-fields-for="pago-movil" hidden>
                        <div class="form-row-group">
                            <div class="form-row">
                                <label for="movilPhone">Teléfono asociado</label>
                                <input type="tel" id="movilPhone" name="movil_phone" placeholder="04XX-XXXXXXX">
                            </div>
                            <div class="form-row">
                                <label for="movilRef">N° de referencia</label>
                                <input type="text" id="movilRef" name="movil_reference" placeholder="Número de referencia">
                            </div>
                        </div>
                    </div>

                    <div class="payment-fields" data-fields-for="paypal" hidden>
                        <div class="form-row-group">
                            <div class="form-row">
                                <label for="paypalEmail">Email de PayPal</label>
                                <input type="email" id="paypalEmail" name="paypal_email" placeholder="tu-cuenta@paypal.com">
                            </div>
                            <div class="form-row">
                                <label for="paypalTx">ID de transacción</label>
                                <input type="text" id="paypalTx" name="paypal_transaction" placeholder="ID de transacción">
                            </div>
                        </div>
                    </div>

                    <p class="form-note">* Te vamos a contactar para validar el pago y coordinar la entrega de tu mando personalizado.</p>

                    <button type="submit" class="btn-submit-order">Confirmar pedido</button>
                </form>
            </div>

            <!-- Success view -->
            <div class="modal-success" id="orderSuccess" hidden>
                <div class="modal-success-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                </div>
                <h3>¡Pedido recibido!</h3>
                <p>Vamos a contactarte a <strong id="successContact"></strong> para validar el pago por <strong id="successMethod"></strong> y coordinar tu mando <strong id="successModel">{{ $model === 'xbox' ? 'Xbox' : 'PS5' }}</strong>.</p>
                <button type="button" class="btn-outline-modal" id="orderSuccessClose">Cerrar</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/order-modal.js') }}"></script>
</body>
</html>
