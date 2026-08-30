<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RTE Custom Controller | Personaliza tu Mando {{ $model === 'xbox' ? 'XBOX' : 'PS5' }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body data-model="{{ $model }}">
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('Recurso 8LOGO BANNER.png') }}" alt="RTE Custom Controller">
            </a>
            <nav class="nav" id="mainNav">
                <a href="{{ url('/') }}" class="nav-link" data-i18n="custom_nav_home">INICIO</a>
                <a href="{{ url('/#plataformas') }}" class="nav-link" data-i18n="custom_nav_platforms">PLATAFORMAS</a>
                <a href="{{ url('/#features') }}" class="nav-link" data-i18n="custom_nav_features">CARACTERÍSTICAS</a>
                @if(auth()->check())
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.orders.index') }}" class="nav-link" style="color:#4ade80;">ADMIN</a>
                    @endif
                    <a href="{{ route('orders.index') }}" class="nav-link" data-i18n="custom_nav_orders">MIS ÓRDENES</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background:none;border:none;cursor:pointer;" data-i18n="custom_nav_logout">CERRAR SESIÓN</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link" data-i18n="custom_nav_login">INICIAR SESIÓN</a>
                @endif
            </nav>

            <div class="country-switch" style="display:flex; align-items:center; gap:8px; margin-left:12px;">
                <button type="button" class="site-country-btn" data-country="VE" title="Venezuela" style="background:none;border:2px solid transparent;border-radius:50%;padding:4px;cursor:pointer;font-size:1.25rem;">🇻🇪</button>
                <button type="button" class="site-country-btn" data-country="US" title="United States" style="background:none;border:2px solid transparent;border-radius:50%;padding:4px;cursor:pointer;font-size:1.25rem;">🇺🇸</button>
            </div>

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
                        <span data-i18n="custom_back">Elegir otro modelo</span>
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
                <div class="order-type-section" style="margin-bottom: 20px;">
                    <p class="order-type-label" data-i18n="custom_order_type_label" style="font-size: 0.85rem; color: #9aa0aa; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.05em;">Tipo de pedido</p>
                    <div class="order-type-options" style="display: flex; gap: 12px;">
                        <button type="button" class="order-type-btn active" data-order-type="new" style="flex: 1; padding: 14px; border: 1px solid #26282c; border-radius: 12px; background: #0b0d10; color: #fff; cursor: pointer; text-align: left; transition: all 0.2s;">
                            <strong data-i18n="custom_order_new_title" style="display: block; font-size: 1rem; margin-bottom: 4px;">Control nuevo</strong>
                            <span data-i18n="custom_order_new_price" style="font-size: 0.85rem; color: #4ade80;">Desde $79.99</span>
                        </button>
                        <button type="button" class="order-type-btn" data-order-type="mailIn" style="flex: 1; padding: 14px; border: 1px solid #26282c; border-radius: 12px; background: #0b0d10; color: #fff; cursor: pointer; text-align: left; transition: all 0.2s;">
                            <strong data-i18n="custom_order_mail_title" style="display: block; font-size: 1rem; margin-bottom: 4px;">Envío / Control del cliente</strong>
                            <span data-i18n="custom_order_mail_price" style="font-size: 0.85rem; color: #4ade80;">Desde $55.00</span>
                        </button>
                    </div>
                </div>

                <div class="price-section">
                    <h3 class="price" id="totalPrice">$ 79.99</h3>
                    @if(auth()->check())
                        <button type="button" class="order-btn" id="orderBtn" data-i18n="custom_quote">
                            Cotizar
                            <svg viewBox="0 0 24 24" width="20" height="20">
                                <path fill="currentColor" d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2m-5 12H9v-2h6zm5-7H4V4l16-.02z"/>
                            </svg>
                        </button>
                    @else
                        <a href="{{ route('register') }}" class="order-btn" style="text-decoration: none;" data-i18n="custom_quote">
                            Cotizar
                            <svg viewBox="0 0 24 24" width="20" height="20">
                                <path fill="currentColor" d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2m-5 12H9v-2h6zm5-7H4V4l16-.02z"/>
                            </svg>
                        </a>
                    @endif
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
                    <button class="tab-btn" data-tab="backPanel">
                        <img src="https://customizer.diemgaming.com.ar/ps5/back-shell/back.png" alt="Back Shell">
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

    <!-- Repair Services -->
    <section class='repair-section' style='padding: 60px 0; background: #0b0d10; border-top: 1px solid #26282c;'>
        <div class='container'>
            <div class='section-head' style='text-align: center; margin-bottom: 40px;'>
                <span style='font-size: 0.85rem; color: #4ade80; text-transform: uppercase; letter-spacing: 0.05em;'>SERVICIOS</span>
                <h2 style='font-size: 2rem; margin: 12px 0 16px;'>Reparación de Drift + Adicionales</h2>
                <p style='color: #9aa0aa;'>Si ya tenés un control y necesitás reparación de sticks, acá podés ver los precios y sumar adicionales.</p>
            </div>
            <div class='repair-grid' style='display: grid; gap: 16px; max-width: 720px; margin: 0 auto;'>
                <div class='repair-card' style='padding: 20px; border: 1px solid #26282c; border-radius: 16px; background: #111319;'>
                    <h3 style='margin-bottom: 16px; font-size: 1.1rem;'>Joystick / Stick Drift Repair</h3>
                    <label style='display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; color: #fff; cursor: pointer;'>
                        <span>PS4 DualShock 4</span>
                        <span style='color: #4ade80; font-weight: 600;'>$55.00</span>
                        <input type='radio' name='repair_model' value='ps4' data-repair-price='55000' onchange='updateRepairTotal()' style='margin-left: 12px;'>
                    </label>
                    <label style='display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; color: #fff; cursor: pointer;'>
                        <span>PS5 DualSense</span>
                        <span style='color: #4ade80; font-weight: 600;'>$55.00</span>
                        <input type='radio' name='repair_model' value='ps5' data-repair-price='55000' onchange='updateRepairTotal()' style='margin-left: 12px;'>
                    </label>
                    <label style='display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; color: #fff; cursor: pointer;'>
                        <span>Xbox</span>
                        <span style='color: #4ade80; font-weight: 600;'>$55.00</span>
                        <input type='radio' name='repair_model' value='xbox' data-repair-price='55000' onchange='updateRepairTotal()' style='margin-left: 12px;'>
                    </label>
                    <label style='display: flex; align-items: center; justify-content: space-between; color: #fff; cursor: pointer;'>
                        <span>PS5 DualSense Edge</span>
                        <span style='color: #4ade80; font-weight: 600;'>$65.00</span>
                        <input type='radio' name='repair_model' value='edge' data-repair-price='65000' onchange='updateRepairTotal()' style='margin-left: 12px;'>
                    </label>
                </div>

                <div class='repair-card' style='padding: 20px; border: 1px solid #26282c; border-radius: 16px; background: #111319;'>
                    <h3 style='margin-bottom: 16px; font-size: 1.1rem;'>Adicionales opcionales</h3>
                    <label style='display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; color: #fff; cursor: pointer;'>
                        <span>Mouse Click Buttons (Clicky Face + Triggers)</span>
                        <span style='color: #4ade80; font-weight: 600;'>+$70.00</span>
                        <input type='checkbox' data-repair-price='70000' onchange='updateRepairTotal()' style='margin-left: 12px;'>
                    </label>
                    <label style='display: flex; align-items: center; justify-content: space-between; color: #fff; cursor: pointer;'>
                        <span>4 Back Buttons Kit (+ carcasa compatible + grips)</span>
                        <span style='color: #4ade80; font-weight: 600;'>+$70.00</span>
                        <input type='checkbox' data-repair-price='70000' onchange='updateRepairTotal()' style='margin-left: 12px;'>
                    </label>
                </div>

                <div class='repair-total' style='text-align: right; font-size: 1.5rem; font-weight: 700;'>
                    Total: <span id='repairTotal' style='color: #4ade80;'>$0.00</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p data-i18n="custom_footer_copy">Copyright {{ date('Y') }}  RTE Custom Controller. Todos los derechos reservados.</p>
            <p data-i18n="custom_footer_dev">Desarrollado por <a href="#" target="_blank">Daayi</a></p>
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
                <span class="modal-eyebrow" data-i18n="custom_modal_eyebrow">Resumen de tu pedido</span>
                <h3 id="orderModalTitle" data-i18n="custom_modal_title">Confirmá tu cotización</h3>

                <div class="modal-quote">
                    <span data-i18n="custom_modal_total">Total estimado</span>
                    <strong id="modalQuotePrice">$ 0,00</strong>
                </div>

                <form id="orderForm" class="order-form" novalidate>
                    <p class="form-note" style="margin-bottom: 18px;" data-i18n="custom_modal_note">Usaremos los datos de tu cuenta (nombre, email y teléfono) para el pedido.</p>

                    <button type="submit" class="btn-submit-order" data-i18n="custom_modal_submit">Confirmar pedido</button>
                </form>
            </div>

            <!-- Success view -->
            <div class="modal-success" id="orderSuccess" hidden>
                <div class="modal-success-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>
                </div>
                <h3 data-i18n="custom_modal_success_title">¡Pedido recibido!</h3>
                <p>Vamos a contactarte a <strong id="successContact"></strong> para validar el pago por <strong id="successMethod"></strong> y coordinar tu mando <strong id="successModel">{{ $model === 'xbox' ? 'Xbox' : 'PS5' }}</strong>.</p>
                <button type="button" class="btn-outline-modal" id="orderSuccessClose" data-i18n="custom_modal_close">Cerrar</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/order-modal.js') }}"></script>
    <script>
        (function() {
            const translations = {
                es: {
                    custom_nav_home: 'INICIO',
                    custom_nav_platforms: 'PLATAFORMAS',
                    custom_nav_features: 'CARACTERÍSTICAS',
                    custom_nav_orders: 'MIS ÓRDENES',
                    custom_nav_logout: 'CERRAR SESIÓN',
                    custom_nav_login: 'INICIAR SESIÓN',
                    custom_back: 'Elegir otro modelo',
                    custom_order_type_label: 'Tipo de pedido',
                    custom_order_new_title: 'Control nuevo',
                    custom_order_new_price: 'Desde $79.99',
                    custom_order_mail_title: 'Envío / Control del cliente',
                    custom_order_mail_price: 'Desde $55.00',
                    custom_quote: 'Cotizar',
                    custom_footer_copy: 'Copyright ' + new Date().getFullYear() + ' © RTE Custom Controller. Todos los derechos reservados.',
                    custom_footer_dev: 'Desarrollado por ',
                    custom_modal_eyebrow: 'Resumen de tu pedido',
                    custom_modal_title: 'Confirmá tu cotización',
                    custom_modal_total: 'Total estimado',
                    custom_modal_note: 'Usaremos los datos de tu cuenta (nombre, email y teléfono) para el pedido.',
                    custom_modal_submit: 'Confirmar pedido',
                    custom_modal_success_title: '¡Pedido recibido!',
                    custom_modal_close: 'Cerrar'
                },
                en: {
                    custom_nav_home: 'HOME',
                    custom_nav_platforms: 'PLATFORMS',
                    custom_nav_features: 'FEATURES',
                    custom_nav_orders: 'MY ORDERS',
                    custom_nav_logout: 'LOG OUT',
                    custom_nav_login: 'LOG IN',
                    custom_back: 'Choose another model',
                    custom_order_type_label: 'Order type',
                    custom_order_new_title: 'New Controller',
                    custom_order_new_price: 'Starting at $79.99',
                    custom_order_mail_title: 'Mail-In / Customer\'s Controller',
                    custom_order_mail_price: 'Starting at $55.00',
                    custom_quote: 'Quote',
                    custom_footer_copy: 'Copyright ' + new Date().getFullYear() + ' © RTE Custom Controller. All rights reserved.',
                    custom_footer_dev: 'Developed by ',
                    custom_modal_eyebrow: 'Order summary',
                    custom_modal_title: 'Confirm your quote',
                    custom_modal_total: 'Estimated total',
                    custom_modal_note: 'We will use your account details (name, email and phone) for the order.',
                    custom_modal_submit: 'Confirm order',
                    custom_modal_success_title: 'Order received!',
                    custom_modal_close: 'Close'
                }
            };

            function setLang(lang) {
                document.documentElement.lang = lang === 'en' ? 'en' : 'es';
                document.querySelectorAll('[data-i18n]').forEach(el => {
                    const key = el.dataset.i18n;
                    if (translations[lang] && translations[lang][key]) {
                        if (key === 'custom_footer_dev') {
                            const link = el.querySelector('a');
                            const devText = translations[lang][key];
                            if (link) {
                                el.textContent = devText;
                                el.appendChild(link);
                            } else {
                                el.textContent = devText;
                            }
                        } else {
                            el.textContent = translations[lang][key];
                        }
                    }
                });
            }

            function detectCountry() {
                const stored = localStorage.getItem('rte_country');
                if (stored) return Promise.resolve(stored);
                return Promise.race([
                    fetch('https://ipapi.co/json/').then(r => { if (!r.ok) throw new Error(); return r.json(); }),
                    new Promise((_, reject) => setTimeout(() => reject(new Error()), 2000))
                ]).then(data => data.country_code === 'US' ? 'US' : 'VE').catch(() => {
                    const langs = navigator.languages || [navigator.language || 'es'];
                    return langs.some(l => (l || '').toLowerCase().startsWith('en')) ? 'US' : 'VE';
                });
            }

            detectCountry().then(saved => {
                localStorage.setItem('rte_country', saved);
                const lang = saved === 'US' ? 'en' : 'es';
                document.querySelectorAll('.site-country-btn').forEach(btn => {
                    if (btn.dataset.country === saved) {
                        btn.style.borderColor = '#4ade80';
                    }
                    btn.addEventListener('click', function() {
                        const selected = this.dataset.country;
                        localStorage.setItem('rte_country', selected);
                        document.querySelectorAll('.site-country-btn').forEach(b => b.style.borderColor = 'transparent');
                        this.style.borderColor = '#4ade80';
                        setLang(selected === 'US' ? 'en' : 'es');
                    });
                });
                setLang(lang);
            });
        })();
    </script>

    <script>
        function updateRepairTotal() {
            const model = document.querySelector('input[name="repair_model"]:checked');
            const addOns = document.querySelectorAll('[data-repair-price]:checked');
            let total = 0;
            if (model) total += parseInt(model.dataset.repairPrice);
            addOns.forEach(el => total += parseInt(el.dataset.repairPrice));
            document.getElementById('repairTotal').textContent = `$ ${(total / 1000).toFixed(2)}`;
        }
    </script>
</body>
</html>
