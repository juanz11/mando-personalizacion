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
                <a href="#inicio">Inicio</a>
                <a href="#plataformas">Personalizar</a>
                <a href="#features">Características</a>
                <a href="/ps5" class="btn btn-primary" style="padding: 10px 24px;">Personalizar Ahora</a>
            </nav>

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
                <span class="hero-eyebrow">RTE Custom Controller: PERSONALIZACIÓN SIN LÍMITES</span>
                <h1>Construí tu Mando Definitivo</h1>
                <p>Mandos premium personalizados para PS5 y Xbox, diseñados para el juego competitivo. Elegí cada color, cada textura y cada detalle.</p>
                <div class="hero-actions">
                    <a href="/ps5" class="btn btn-primary">PERSONALIZAR AHORA</a>
                    <a href="#plataformas" class="btn btn-outline">VER PLATAFORMAS</a>
                </div>
            </div>
        </section>

        <!-- Elegí tu plataforma -->
        <section id="plataformas">
            <div class="container">
                <div class="section-head">
                    <span class="section-eyebrow">// ELEGÍ TU PLATAFORMA</span>
                    <h2>Creá un mando 100% personalizado</h2>
                    <p>Personalizá cada pieza de tu control y mejorá tu experiencia de juego.</p>
                </div>

                <div class="platform-grid">
                    <a href="/ps5" class="platform-card">
                        <div class="platform-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 12h.01M6 15h.01M17.5 9h.01M14.5 12h.01M2 12c0-3.5 1-6 3-6h14c2 0 3 2.5 3 6s-1 8-4 8c-1.5 0-2-1.5-3-3H9c-1 1.5-1.5 3-3 3-3 0-4-4.5-4-8Z"/>
                            </svg>
                        </div>
                        <h3>Mandos PS5</h3>
                        <p>Diseñá tu DualSense con la combinación de colores y texturas que quieras.</p>
                        <span class="btn btn-primary">PERSONALIZAR</span>
                    </a>

                    <a href="/xbox" class="platform-card">
                        <div class="platform-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M8 9c1.5 2 2.5 3 4 3s2.5-1 4-3M6 18c1.5-2.5 3.5-4 6-4s4.5 1.5 6 4"/>
                            </svg>
                        </div>
                        <h3>Mandos Xbox</h3>
                        <p>Armá tu control Xbox a medida, con la estética y el rendimiento que buscás.</p>
                        <span class="btn btn-primary">PERSONALIZAR</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="features-section">
            <div class="container">
                <div class="section-head">
                    <span class="section-eyebrow">VENTAJA COMPETITIVA</span>
                    <h2>Hechos para profesionales</h2>
                    <p>Cada mando incluye componentes de nivel competitivo pensados para la victoria.</p>
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>
                            </svg>
                        </div>
                        <h3>Joysticks Anti-Drift TMR</h3>
                        <p>Sticks analógicos magnéticos de alta precisión, diseñados para un juego más suave y sin drift.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2 3 14h9l-1 8 10-12h-9l1-8Z"/>
                            </svg>
                        </div>
                        <h3>Gatillos de Respuesta Instantánea</h3>
                        <p>L1, R1, L2 y R2 con switches estilo mouse para una activación instantánea y precisa.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="4" width="16" height="16" rx="3"/><path d="M9 9h.01M15 9h.01M9 15h.01M15 15h.01"/>
                            </svg>
                        </div>
                        <h3>Botones Digitales Mecánicos</h3>
                        <p>Botones frontales y D-pad clicky para una respuesta más rápida y precisa.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 12c0-4.4 3.6-8 8-8s8 3.6 8 8-3.6 8-8 8"/><path d="M4 12c0 2.2.9 4.2 2.3 5.7M9 20a8 8 0 0 1-3-2"/>
                            </svg>
                        </div>
                        <h3>Grip Texturizado de Alto Rendimiento</h3>
                        <p>Parte trasera antideslizante y texturizada para mejor agarre, comodidad y control.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M3 12h3M18 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/>
                            </svg>
                        </div>
                        <h3>Sticks Intercambiables</h3>
                        <p>Sticks removibles con 3 alturas diferentes para adaptar los controles a tu estilo de juego.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="6" width="18" height="12" rx="2"/><path d="M7 10v4M11 10v4M15 10v4"/>
                            </svg>
                        </div>
                        <h3>4 Paletas Traseras Remapeables</h3>
                        <p>Botones traseros configurables para ejecutar acciones clave sin soltar los sticks.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA final -->
        <section class="cta-section">
            <div class="container">
                <h2>¿Listo para armar tu mando?</h2>
                <p>Elegí tu plataforma y personalizá cada detalle con nuestro configurador online.</p>
                <div class="hero-actions">
                    <a href="/ps5" class="btn btn-primary">PERSONALIZAR PS5</a>
                    <a href="/xbox" class="btn btn-outline">PERSONALIZAR XBOX</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Información</h4>
                    <ul>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                        <li><a href="/ps5">Personalizar PS5</a></li>
                        <li><a href="/xbox">Personalizar Xbox</a></li>
                    </ul>
                </div>

                <div class="footer-brand">
                    <img src="{{ asset('LOGO BLANCO/LOGO BLANCO.png') }}" alt="RTE Custom Controller Logo">
                    <p>Mandos pro totalmente modificados y de alto rendimiento para jugadores exigentes. Elevá tu experiencia de juego con la máxima precisión.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37zM17.5 6.5h.01"/></svg>
                        </a>
                        <a href="#" aria-label="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.01 1.62 4.14.94 1.07 2.27 1.77 3.66 2.02v3.74c-1.74-.03-3.41-.65-4.75-1.76-.08-.07-.15-.15-.22-.22V14.5c0 2.3-.92 4.51-2.58 6.12-1.8 1.76-4.32 2.62-6.83 2.34-2.88-.32-5.46-2.39-6.27-5.17C.32 14.58.84 11.08 2.87 8.64c1.83-2.2 4.67-3.37 7.5-3.08v3.74c-1.45-.16-2.95.29-3.95 1.34-.96 1.01-1.36 2.47-1.07 3.86.35 1.68 1.83 2.94 3.55 3.01 1.77.07 3.39-1.06 3.82-2.77.15-.59.18-1.21.18-1.82V.02h-.18z"/></svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Nuestra Garantía</h4>
                    <p style="font-size: 0.85rem; color: #9aa0aa; line-height: 1.6;">
                        Todos nuestros controles personalizados incluyen componentes premium, como sticks analógicos magnéticos TMR para evitar el drift por completo.
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>Copyright {{ date('Y') }} © <strong>RTE Custom Controller</strong></p>
            </div>
        </div>
    </footer>

</body>
</html>
