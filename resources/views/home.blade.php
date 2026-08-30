<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RTE Custom Controller | Mandos Personalizados PS5 y Xbox</title>
    <meta name="description" content="Mandos gaming premium personalizados para PS5 y Xbox, con tecnología anti-drift, gatillos digitales y componentes de nivel competitivo.">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('Recurso 8LOGO BANNER.png') }}" alt="RTE Custom Controller Logo">
            </a>

            <nav class="site-nav">
                <a href="#inicio" data-i18n="home_nav_inicio">Inicio</a>
                <a href="#plataformas" data-i18n="home_nav_personalize">Personalizar</a>
                <a href="#features" data-i18n="home_nav_features">Características</a>
                <a href="/ps5" class="btn btn-primary" style="padding: 10px 24px;" data-i18n="home_nav_cta">Personalizar Ahora</a>
                @if(auth()->check())
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary" style="padding: 10px 24px;">Admin</a>
                    @endif
                    <a href="{{ route('orders.index') }}" class="btn btn-outline" style="padding: 10px 24px;" data-i18n="home_nav_orders">Mis Órdenes</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline" style="padding: 10px 24px;" data-i18n="home_nav_logout">Cerrar Sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline" style="padding: 10px 24px;" data-i18n="home_nav_login">Iniciar Sesión</a>
                @endif
            </nav>

            <div class="country-switch" style="display:flex; align-items:center; gap:8px; margin-left:12px;">
                <button type="button" class="site-country-btn" data-country="VE" title="Venezuela" style="background:none;border:2px solid transparent;border-radius:50%;padding:4px;cursor:pointer;font-size:1.25rem;">🇻🇪</button>
                <button type="button" class="site-country-btn" data-country="US" title="United States" style="background:none;border:2px solid transparent;border-radius:50%;padding:4px;cursor:pointer;font-size:1.25rem;">🇺🇸</button>
            </div>

            <button class="menu-toggle" aria-label="Abrir menú">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/>
                </svg>
            </button>
        </div>
    </header>

    <main>
        <!-- Hero -->
        <section id="inicio" class="hero">
            <video class="hero-video" autoplay muted loop playsinline>
                <source src="{{ asset('0808.mp4') }}" type="video/mp4">
            </video>
            <div class="hero-inner">
                <span class="hero-eyebrow" data-i18n="home_hero_eyebrow">RTE Custom Controller: PERSONALIZACIÓN SIN LÍMITES</span>
                <h1 data-i18n="home_hero_title">Diseñá tu Mando Definitivo</h1>
                <p data-i18n="home_hero_desc">Mandos premium personalizados para PS5 y Xbox, diseñados para el juego competitivo. Elegí cada color, cada textura y cada detalle.</p>
                <div class="hero-actions">
                    <a href="/ps5" class="btn btn-primary" data-i18n="home_hero_btn1">PERSONALIZAR AHORA</a>
                    <a href="#plataformas" class="btn btn-outline" data-i18n="home_hero_btn2">VER PLATAFORMAS</a>
                </div>
            </div>
        </section>

        <!-- Elegí tu plataforma -->
        <section id="plataformas">
            <div class="container">
                <div class="section-head">
                    <span class="section-eyebrow" data-i18n="home_platforms_eyebrow">// ELEGÍ TU PLATAFORMA</span>
                    <h2 data-i18n="home_platforms_title">Creá un mando 100% personalizado</h2>
                    <p data-i18n="home_platforms_desc">Personalizá cada pieza de tu control y mejorá tu experiencia de juego.</p>
                </div>

                <div class="platform-grid">
                    <a href="/ps5" class="platform-card">
                        <div class="platform-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 12h.01M6 15h.01M17.5 9h.01M14.5 12h.01M2 12c0-3.5 1-6 3-6h14c2 0 3 2.5 3 6s-1 8-4 8c-1.5 0-2-1.5-3-3H9c-1 1.5-1.5 3-3 3-3 0-4-4.5-4-8Z"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_ps5_title">Mandos PS5</h3>
                        <p data-i18n="home_ps5_desc">Diseñá tu DualSense con la combinación de colores y texturas que quieras.</p>
                        <span class="btn btn-primary" data-i18n="home_ps5_btn">PERSONALIZAR</span>
                    </a>

                    <a href="/xbox" class="platform-card">
                        <div class="platform-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M8 9c1.5 2 2.5 3 4 3s2.5-1 4-3M6 18c1.5-2.5 3.5-4 6-4s4.5 1.5 6 4"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_xbox_title">Mandos Xbox</h3>
                        <p data-i18n="home_xbox_desc">Armá tu control Xbox a medida, con la estética y el rendimiento que buscás.</p>
                        <span class="btn btn-primary" data-i18n="home_xbox_btn">PERSONALIZAR</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Support -->
        <section class='support-section' style='padding: 80px 0; background: #0b0d10; border-top: 1px solid #26282c;'>
            <div class='container'>
                <div class='section-head' style='text-align: center; margin-bottom: 40px;'>
                    <div style='width: 56px; height: 56px; margin: 0 auto 16px; color: #4ade80;'>
                        <svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' style='width: 100%; height: 100%;' aria-hidden='true'>
                            <path d='M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.3-3.3a6 6 0 0 1-7.4 7.4l-9.4 9.4a2.12 2.12 0 0 1-3-3l9.4-9.4a6 6 0 0 1 7.4-7.4l-2.4 2.4-1.6-1.6a1 1 0 0 0-1.4 0z'/>
                        </svg>
                    </div>
                    <span class='section-eyebrow' data-i18n='home_support_eyebrow'>// ¿EQUIPO PREVIO?</span>
                    <h2 data-i18n='home_support_title'>Reparación y personalización</h2>
                    <p data-i18n='home_support_desc'>Si ya tenés un mando y querés repararlo o personalizarlo, contactanos por WhatsApp o pedí una reunión por Zoom.</p>
                </div>

                <div class='features-grid' style='grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); max-width: 820px; margin: 0 auto;'>
                    <div class='feature-card' style='text-align: center;'>
                        <div class='feature-icon' style='margin-bottom: 16px;'>
                            <svg viewBox='0 0 24 24' fill='none' style='width: 44px; height: 44px; color: #25D366;' aria-hidden='true'>
                                <path d='M17.5 14.25c-.25-.12-1.55-.76-1.79-.85-.24-.09-.41-.14-.58.14-.17.28-.65.85-.79 1.02-.15.17-.29.19-.54.07-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.15-.25-.02-.39.11-.51.12-.12.25-.29.37-.44.12-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.12-.58-1.4-.8-1.91-.21-.5-.42-.43-.58-.44l-.49-.01c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.12.17 1.78 2.72 4.31 3.82.6.26 1.07.42 1.43.54.6.19 1.15.16 1.58.1.48-.07 1.55-.64 1.77-1.25.22-.62.22-1.15.15-1.25-.06-.11-.23-.17-.48-.29zM12.2 2.004c-5.52 0-10 4.48-10 10 0 1.76.46 3.43 1.33 4.9L2 22l5.27-1.51A9.96 9.96 0 0012.2 22c5.52 0 10-4.48 10-10s-4.48-10-10-10z' fill='currentColor'/>
                            </svg>
                        </div>
                        <h3 data-i18n='home_support_whatsapp_title'>WhatsApp</h3>
                        <p style='font-size: 1.1rem; color: #fff; margin-bottom: 16px;'>+58 4127141909</p>
                        <a href='https://wa.me/584127141909' target='_blank' rel='noopener' class='btn btn-primary' data-i18n='home_support_whatsapp_btn'>Contactar por WhatsApp</a>
                    </div>

                    <div class='feature-card' style='text-align: center;'>
                        <div class='feature-icon' style='margin-bottom: 16px;'>
                            <svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' style='width: 44px; height: 44px; color: #4ade80;' aria-hidden='true'>
                            <path d='M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z'/>
                            <polyline points='3.27 6.96 12 12.01 20.73 6.96'/>
                            <line x1='12' y1='22.08' x2='12' y2='12'/>
                        </svg>
                        </div>
                        <h3 data-i18n='home_support_zoom_title'>Envíos Zoom</h3>
                        <p data-i18n='home_support_zoom_label' style='margin-bottom: 8px; color: #a1a5ab;'>Dirección de recepción:</p>
                        <code style='display: block; background: #0b0d10; color: #4ade80; padding: 10px 14px; border-radius: 8px; font-size: 0.85rem; word-break: break-all; margin-bottom: 8px;'>Av. Principal, Edificio Centro Ejecutivo, Piso 3, Oficina 305, Chacao, Caracas - Venezuela</code>
                        <button type='button' class='btn btn-outline' style='margin-bottom: 12px; padding: 6px 14px; font-size: 0.85rem;' data-i18n='home_support_copy_address' onclick='copyAddress(this)'>Copiar dirección</button>
                        <a href='#' class='btn btn-outline' data-i18n='home_support_zoom_btn'>Enviar por Zoom</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="features-section">
            <div class="container">
                <div class="section-head">
                    <span class="section-eyebrow" data-i18n="home_features_eyebrow">VENTAJA COMPETITIVA</span>
                    <h2 data-i18n="home_features_title">Hechos para profesionales</h2>
                    <p data-i18n="home_features_desc">Cada mando incluye componentes de nivel competitivo pensados para la victoria.</p>
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_feature_1_title">Joysticks Anti-Drift TMR</h3>
                        <p data-i18n="home_feature_1_desc">Sticks analógicos magnéticos de alta precisión, diseñados para un juego más suave y sin drift.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2 3 14h9l-1 8 10-12h-9l1-8Z"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_feature_2_title">Gatillos de Respuesta Instantánea</h3>
                        <p data-i18n="home_feature_2_desc">L1, R1, L2 y R2 con switches estilo mouse para una activación instantánea y precisa.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="4" width="16" height="16" rx="3"/><path d="M9 9h.01M15 9h.01M9 15h.01M15 15h.01"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_feature_3_title">Botones Digitales Mecánicos</h3>
                        <p data-i18n="home_feature_3_desc">Botones frontales y D-pad clicky para una respuesta más rápida y precisa.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 12c0-4.4 3.6-8 8-8s8 3.6 8 8-3.6 8-8 8"/><path d="M4 12c0 2.2.9 4.2 2.3 5.7M9 20a8 8 0 0 1-3-2"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_feature_4_title">Grip Texturizado de Alto Rendimiento</h3>
                        <p data-i18n="home_feature_4_desc">Parte trasera antideslizante y texturizada para mejor agarre, comodidad y control.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"/><path d="M12 2v4M12 18v4M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M3 12h3M18 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_feature_5_title">Sticks Intercambiables</h3>
                        <p data-i18n="home_feature_5_desc">Sticks removibles con 3 alturas diferentes para adaptar los controles a tu estilo de juego.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="6" width="18" height="12" rx="2"/><path d="M7 10v4M11 10v4M15 10v4"/>
                            </svg>
                        </div>
                        <h3 data-i18n="home_feature_6_title">4 Paletas Traseras Remapeables</h3>
                        <p data-i18n="home_feature_6_desc">Botones traseros configurables para ejecutar acciones clave sin soltar los sticks.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA final -->
        <section class="cta-section">
            <div class="container">
                <h2 data-i18n="home_cta_title">¿Listo para armar tu mando?</h2>
                <p data-i18n="home_cta_desc">Elegí tu plataforma y personalizá cada detalle con nuestro configurador online.</p>
                <div class="hero-actions">
                    <a href="/ps5" class="btn btn-primary" data-i18n="home_cta_ps5">PERSONALIZAR PS5</a>
                    <a href="/xbox" class="btn btn-outline" data-i18n="home_cta_xbox">PERSONALIZAR XBOX</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4 data-i18n="home_footer_info">Información</h4>
                    <ul>
                        <li><a href="#" data-i18n="home_footer_contact">Contacto</a></li>
                        <li><a href="#" data-i18n="home_footer_faq">Preguntas Frecuentes</a></li>
                        <li><a href="/ps5" data-i18n="home_footer_ps5">Personalizar PS5</a></li>
                        <li><a href="/xbox" data-i18n="home_footer_xbox">Personalizar Xbox</a></li>
                    </ul>
                </div>

                <div class="footer-brand">
                    <img src="{{ asset('LOGO BLANCO/LOGO BLANCO.png') }}" alt="RTE Custom Controller Logo" data-i18n="home_footer_logo_alt">
                    <p data-i18n="home_footer_brand_desc">Mandos pro totalmente modificados y de alto rendimiento para jugadores exigentes. Elevá tu experiencia de juego con la máxima precisión.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37zM17.5 6.5h.01"/></svg>
                        </a>
                        <a href="#" aria-label="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.01 1.62 4.14.94 1.07 2.27 1.77 3.66 2.02v3.74c-1.74-.03-3.41-.65-4.75-1.76-.08-.07-.15-.15-.22-.22V14.5c0 2.3-.92 4.51-2.58 6.12-1.8 1.76-4.32 2.62-6.83 2.34-2.88-.32-5.46-2.39-6.27-5.17C.32 14.58.84 11.08 2.87 8.64c1.83-2.2 4.67-3.37 7.5-3.08v3.74c-1.45-.16-2.95.29-3.95 1.34-.96 1.01-1.36 2.47-1.07 3.86.35 1.68 1.83 2.94 3.55 3.01 1.77.07 3.39-1.06 3.82-2.77.15-.59.18-1.21.18-1.82V.02h-.18z"/></svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 002.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4 data-i18n="home_footer_warranty">Nuestra Garantía</h4>
                    <p style="font-size: 0.85rem; color: #9aa0aa; line-height: 1.6;" data-i18n="home_footer_warranty_desc">
                        Todos nuestros controles personalizados incluyen componentes premium, como sticks analógicos magnéticos TMR para evitar el drift por completo.
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>Copyright {{ date('Y') }} &copy; <strong>RTE Custom Controller</strong></p>
            </div>
        </div>
    </footer>

<script>
    (function() {
        const translations = {
            es: {
                home_nav_inicio: 'Inicio',
                home_nav_personalize: 'Personalizar',
                home_nav_features: 'Características',
                home_nav_cta: 'Personalizar Ahora',
                home_nav_orders: 'Mis Órdenes',
                home_nav_logout: 'Cerrar Sesión',
                home_nav_login: 'Iniciar Sesión',
                home_hero_eyebrow: 'RTE Custom Controller: PERSONALIZACIÓN SIN LÍMITES',
                home_hero_title: 'Diseñá tu Mando Definitivo',
                home_hero_desc: 'Mandos premium personalizados para PS5 y Xbox, diseñados para el juego competitivo. Elegí cada color, cada textura y cada detalle.',
                home_hero_btn1: 'PERSONALIZAR AHORA',
                home_hero_btn2: 'VER PLATAFORMAS',
                home_platforms_eyebrow: '// ELEGÍ TU PLATAFORMA',
                home_platforms_title: 'Creá un mando 100% personalizado',
                home_platforms_desc: 'Personalizá cada pieza de tu control y mejorá tu experiencia de juego.',
                home_ps5_title: 'Mandos PS5',
                home_ps5_desc: 'Diseñá tu DualSense con la combinación de colores y texturas que quieras.',
                home_ps5_btn: 'PERSONALIZAR',
                home_xbox_title: 'Mandos Xbox',
                home_xbox_desc: 'Armá tu control Xbox a medida, con la estética y el rendimiento que buscás.',
                home_xbox_btn: 'PERSONALIZAR',
                home_features_eyebrow: 'VENTAJA COMPETITIVA',
                home_features_title: 'Hechos para profesionales',
                home_features_desc: 'Cada mando incluye componentes de nivel competitivo pensados para la victoria.',
                home_feature_1_title: 'Joysticks Anti-Drift TMR',
                home_feature_1_desc: 'Sticks analógicos magnéticos de alta precisión, diseñados para un juego más suave y sin drift.',
                home_feature_2_title: 'Gatillos de Respuesta Instantánea',
                home_feature_2_desc: 'L1, R1, L2 y R2 con switches estilo mouse para una activación instantánea y precisa.',
                home_feature_3_title: 'Botones Digitales Mecánicos',
                home_feature_3_desc: 'Botones frontales y D-pad clicky para una respuesta más rápida y precisa.',
                home_feature_4_title: 'Grip Texturizado de Alto Rendimiento',
                home_feature_4_desc: 'Parte trasera antideslizante y texturizada para mejor agarre, comodidad y control.',
                home_feature_5_title: 'Sticks Intercambiables',
                home_feature_5_desc: 'Sticks removibles con 3 alturas diferentes para adaptar los controles a tu estilo de juego.',
                home_feature_6_title: '4 Paletas Traseras Remapeables',
                home_feature_6_desc: 'Botones traseros configurables para ejecutar acciones clave sin soltar los sticks.',
                home_cta_title: '¿Listo para armar tu mando?',
                home_cta_desc: 'Elegí tu plataforma y personalizá cada detalle con nuestro configurador online.',
                home_cta_ps5: 'PERSONALIZAR PS5',
                home_cta_xbox: 'PERSONALIZAR XBOX',
                home_footer_info: 'Información',
                home_footer_contact: 'Contacto',
                home_footer_faq: 'Preguntas Frecuentes',
                home_footer_ps5: 'Personalizar PS5',
                home_footer_xbox: 'Personalizar Xbox',
                home_footer_logo_alt: 'RTE Custom Controller Logo',
                home_footer_brand_desc: 'Mandos pro totalmente modificados y de alto rendimiento para jugadores exigentes. Elevá tu experiencia de juego con la máxima precisión.',
                home_footer_warranty: 'Nuestra Garantía',
                home_footer_warranty_desc: 'Todos nuestros controles personalizados incluyen componentes premium, como sticks analógicos magnéticos TMR para evitar el drift por completo.',
                home_support_eyebrow: '// ¿EQUIPO PREVIO?',
                home_support_title: 'Reparación y personalización',
                home_support_desc: 'Si ya tenés un mando y querés repararlo o personalizarlo, contactanos por WhatsApp o envialo por Zoom.',
                home_support_whatsapp_title: 'WhatsApp',
                home_support_whatsapp_btn: 'Contactar por WhatsApp',
                home_support_zoom_title: 'Envíos Zoom',
                home_support_zoom_label: 'Dirección de recepción:',
                home_support_zoom_btn: 'Enviar por Zoom',
                home_support_copy_address: 'Copiar dirección',
            },
            en: {
                home_nav_inicio: 'Home',
                home_nav_personalize: 'Customize',
                home_nav_features: 'Features',
                home_nav_cta: 'Customize Now',
                home_nav_orders: 'My Orders',
                home_nav_logout: 'Log out',
                home_nav_login: 'Log in',
                home_hero_eyebrow: 'RTE Custom Controller: CUSTOMIZATION WITHOUT LIMITS',
                home_hero_title: 'Design Your Ultimate Controller',
                home_hero_desc: 'Premium custom controllers for PS5 and Xbox, designed for competitive play. Choose every color, every texture, every detail.',
                home_hero_btn1: 'CUSTOMIZE NOW',
                home_hero_btn2: 'SEE PLATFORMS',
                home_platforms_eyebrow: '// CHOOSE YOUR PLATFORM',
                home_platforms_title: 'Create a 100% custom controller',
                home_platforms_desc: 'Personalize every piece of your controller and improve your gaming experience.',
                home_ps5_title: 'PS5 Controllers',
                home_ps5_desc: 'Design your DualSense with the colors and textures you want.',
                home_ps5_btn: 'CUSTOMIZE',
                home_xbox_title: 'Xbox Controllers',
                home_xbox_desc: 'Build your custom Xbox controller, with the look and performance you want.',
                home_xbox_btn: 'CUSTOMIZE',
                home_features_eyebrow: 'COMPETITIVE ADVANTAGE',
                home_features_title: 'Built for professionals',
                home_features_desc: 'Every controller includes competitive-grade components designed for victory.',
                home_feature_1_title: 'Anti-Drift TMR Joysticks',
                home_feature_1_desc: 'High-precision magnetic analog sticks, designed for smoother, drift-free gameplay.',
                home_feature_2_title: 'Instant Response Triggers',
                home_feature_2_desc: 'L1, R1, L2 and R2 with mouse-style switches for instant and precise activation.',
                home_feature_3_title: 'Mechanical Digital Buttons',
                home_feature_3_desc: 'Clicky front buttons and D-pad for faster and more precise response.',
                home_feature_4_title: 'High-Performance Textured Grip',
                home_feature_4_desc: 'Non-slip, textured back for better grip, comfort and control.',
                home_feature_5_title: 'Swappable Sticks',
                home_feature_5_desc: 'Removable sticks with 3 different heights to adapt the controller to your playstyle.',
                home_feature_6_title: '4 Remappable Back Paddles',
                home_feature_6_desc: 'Configurable rear buttons to execute key actions without letting go of the sticks.',
                home_cta_title: 'Ready to build your controller?',
                home_cta_desc: 'Choose your platform and customize every detail with our online configurator.',
                home_cta_ps5: 'CUSTOMIZE PS5',
                home_cta_xbox: 'CUSTOMIZE XBOX',
                home_footer_info: 'Information',
                home_footer_contact: 'Contact',
                home_footer_faq: 'FAQ',
                home_footer_ps5: 'Customize PS5',
                home_footer_xbox: 'Customize Xbox',
                home_footer_logo_alt: 'RTE Custom Controller Logo',
                home_footer_brand_desc: 'Pro controllers fully modified and high-performance for demanding players. Elevate your gaming experience with maximum precision.',
                home_footer_warranty: 'Our Warranty',
                home_footer_warranty_desc: 'All our custom controllers include premium components, such as magnetic TMR analog sticks to prevent drift completely.',
                home_support_eyebrow: '// GOT A CONTROLLER?',
                home_support_title: 'Repair & Customization',
                home_support_desc: 'If you already have a controller and want it repaired or customized, reach out on WhatsApp or send it via Zoom.',
                home_support_whatsapp_title: 'WhatsApp',
                home_support_whatsapp_btn: 'Contact on WhatsApp',
                home_support_zoom_title: 'Zoom Shipping',
                home_support_zoom_label: 'Drop-off address:',
                home_support_zoom_btn: 'Ship with Zoom',
                home_support_copy_address: 'Copy address',
            }
        };

        function setLang(lang) {
            document.documentElement.lang = lang === 'en' ? 'en' : 'es';
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.dataset.i18n;
                if (!translations[lang] || !translations[lang][key]) return;
                if (el.tagName === 'IMG') {
                    el.alt = translations[lang][key];
                } else {
                    el.textContent = translations[lang][key];
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
    function copyAddress(btn) {
        const address = btn.previousElementSibling.textContent;
        navigator.clipboard.writeText(address).then(() => {
            const original = btn.textContent;
            btn.textContent = '¡Copiado!';
            setTimeout(() => btn.textContent = original, 2000);
        });
    }
</script>
</body>
</html>
