<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIEM GAMING | Personaliza tu Mando PS5</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <img src="https://via.placeholder.com/120x60/000000/FFFFFF?text=DIEM+GAMING" alt="DIEM GAMING" width="120" height="60">
            </div>
            <nav class="nav">
                <a href="#" class="nav-link">INICIO</a>
                <a href="#" class="nav-link active">MODELOS</a>
                <a href="#" class="nav-link">GUÍAS DE JUEGO</a>
                <a href="#" class="nav-link">PREGUNTAS FRECUENTES</a>
                <a href="#" class="nav-link">INSTAGRAM</a>
            </nav>
            <button class="menu-toggle" id="menuToggle">
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
                    <a href="#" class="back-link">
                        <svg viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor" d="M11.67 3.87 9.9 2.1 0 12l9.9 9.9 1.77-1.77L3.54 12z"/>
                        </svg>
                        Elegir otro modelo
                    </a>
                </div>
                
                <div class="controller-display">
                    <div class="controller-front">
                        <div class="controller-layers">
                            <!-- Imagen base del mando -->
                            <img id="baseImage" src="https://customizer.diemgaming.com.ar/ps5/base.png" alt="Base PS5 Controller" class="controller-layer base-layer">
                            
                            <!-- Capas de colores para cada parte -->
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
                    <button class="order-btn">
                        Hacer pedido
                        <svg viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor" d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2m-5 12H9v-2h6zm5-7H4V4l16-.02z"/>
                        </svg>
                    </button>
                </div>

                <!-- Tabs Navigation -->
                <div class="tabs-nav">
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
            <p>© 2026 <strong>DIEM GAMING</strong>. All rights reserved.</p>
            <p>Desarrollado por <a href="#" target="_blank">Daayi</a></p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
