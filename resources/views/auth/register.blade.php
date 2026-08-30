<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="register_title">Crear Cuenta - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .auth-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0b0d10; padding: 24px; }
        .auth-card { background: #121418; border: 1px solid #26282c; border-radius: 24px; padding: 48px 40px; width: 100%; max-width: 440px; box-shadow: 0 24px 80px rgba(0,0,0,0.5); }
        .auth-card h1 { font-size: 1.75rem; margin-bottom: 8px; text-align: center; color: #fff; }
        .auth-card .tagline { text-align: center; color: #a1a5ab; margin-bottom: 32px; font-size: 0.9rem; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 8px; color: #a1a5ab; font-weight: 500; }
        .form-group input, .form-group select { width: 100%; padding: 14px 16px; border-radius: 12px; border: 1px solid #33363c; background: #0b0d10; color: #fff; outline: none; transition: border-color 0.2s, box-shadow 0.2s; }
        .form-group input:focus, .form-group select:focus { border-color: #4ade80; box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.12); }
        .btn-block { width: 100%; margin-top: 10px; padding: 14px; font-size: 1rem; border-radius: 12px; }
        .auth-link { text-align: center; display: block; margin-top: 20px; color: #a1a5ab; font-size: 0.9rem; text-decoration: none; }
        .auth-link:hover { color: #4ade80; }
        .error { background: #3f0000; color: #ff5a5a; font-size: 0.875rem; margin-bottom: 20px; padding: 10px 14px; border-radius: 10px; }
        .back { display: block; text-align: center; margin-bottom: 20px; color: #a1a5ab; text-decoration: none; font-size: 0.85rem; }
        .back:hover { color: #4ade80; }
    </style>
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <a href="{{ url('/') }}" class="back" data-i18n="register_back">← Volver al inicio</a>
        <h1 data-i18n="register_h1">Crear Cuenta</h1>
        <p class="tagline" data-i18n="register_tagline">Registrate para guardar tus diseños y órdenes.</p>
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name" data-i18n="register_name">Nombre completo</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email" data-i18n="register_email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="register-country" data-i18n="register_country">País</label>
                <select id="register-country" name="country" required>
                    <option value="VE" {{ old('country', 'VE') === 'VE' ? 'selected' : '' }}>Venezuela (+58)</option>
                    <option value="US" {{ old('country') === 'US' ? 'selected' : '' }}>United States (+1)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone-local" data-i18n="register_phone">Teléfono</label>
                <div style="display:flex; gap:10px; align-items:center;">
                    <select id="phone-prefix" style="width:100px; padding:14px 12px; border-radius:12px; border:1px solid #33363c; background:#0b0d10; color:#fff; cursor:pointer;">
                        <option value="0412">0412</option>
                        <option value="0414">0414</option>
                        <option value="0416">0416</option>
                        <option value="0424">0424</option>
                        <option value="0426">0426</option>
                        <option value="0421">0421</option>
                        <option value="0411">0411</option>
                    </select>
                    <span id="phone-us-prefix" style="display:none; width:60px; padding:14px 12px; border-radius:12px; border:1px solid #33363c; background:#0b0d10; color:#4ade80; text-align:center; font-weight:600; cursor:default;">+1</span>
                    <input type="tel" id="phone-local" required style="flex:1;">
                    <input type="hidden" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="password" data-i18n="register_password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation" data-i18n="register_password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" data-i18n="register_submit">Registrarme</button>
        </form>
        <a href="{{ route('login') }}" class="auth-link" data-i18n="register_login">¿Ya tenés cuenta? Iniciar sesión</a>
    </div>
</div>
<script>
    const phoneFull = document.getElementById('phone');
    const phoneLocal = document.getElementById('phone-local');
    const phonePrefix = document.getElementById('phone-prefix');
    const phoneUsPrefix = document.getElementById('phone-us-prefix');
    const countrySelect = document.getElementById('register-country');
    const vePrefixRegex = /^(0412|0414|0416|0424|0426|0421|0411)/;
    const usPrefixRegex = /^\+?1/;

    function cleanLocal() {
        let local = phoneLocal.value.replace(/\D/g, '');
        local = local.replace(vePrefixRegex, '').replace(usPrefixRegex, '').replace(/^0+/, '');
        return local;
    }

    function syncToFull() {
        const local = cleanLocal();
        if (countrySelect.value === 'US') {
            phoneFull.value = '+1' + local;
        } else {
            phoneFull.value = phonePrefix.value + local;
        }
    }

    function parseFullPhone() {
        let local = phoneFull.value.replace(vePrefixRegex, '').replace(usPrefixRegex, '').replace(/^0+/, '');
        if (countrySelect.value === 'VE') {
            const match = phoneFull.value.match(vePrefixRegex);
            if (match) phonePrefix.value = match[1];
        }
        phoneLocal.value = local;
    }

    function updatePhone() {
        if (countrySelect.value === 'US') {
            phonePrefix.style.display = 'none';
            phoneUsPrefix.style.display = 'block';
        } else {
            phonePrefix.style.display = 'block';
            phoneUsPrefix.style.display = 'none';
        }
        parseFullPhone();
        syncToFull();
    }

    phoneLocal.addEventListener('input', syncToFull);
    phonePrefix.addEventListener('change', syncToFull);
    countrySelect.addEventListener('change', () => {
        localStorage.setItem('rte_country', countrySelect.value);
        setLang(countrySelect.value === 'US' ? 'en' : 'es');
        updatePhone();
    });
    updatePhone();
</script>
<script>
    const translations = {
        es: {
            register_title: 'Crear Cuenta - RTE Custom Controller',
            register_back: '← Volver al inicio',
            register_h1: 'Crear Cuenta',
            register_tagline: 'Registrate para guardar tus diseños y órdenes.',
            register_name: 'Nombre completo',
            register_email: 'Email',
            register_country: 'País',
            register_phone: 'Teléfono',
            register_password: 'Contraseña',
            register_password_confirmation: 'Confirmar Contraseña',
            register_submit: 'Registrarme',
            register_login: '¿Ya tenés cuenta? Iniciar sesión'
        },
        en: {
            register_title: 'Create Account - RTE Custom Controller',
            register_back: '← Back to home',
            register_h1: 'Create Account',
            register_tagline: 'Sign up to save your designs and orders.',
            register_name: 'Full name',
            register_email: 'Email',
            register_country: 'Country',
            register_phone: 'Phone',
            register_password: 'Password',
            register_password_confirmation: 'Confirm Password',
            register_submit: 'Sign Up',
            register_login: 'Already have an account? Sign In'
        }
    };

    function setLang(lang) {
        document.documentElement.lang = lang === 'en' ? 'en' : 'es';
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.dataset.i18n;
            if (translations[lang] && translations[lang][key]) {
                if (el.tagName.toLowerCase() === 'title') {
                    document.title = translations[lang][key];
                } else {
                    el.textContent = translations[lang][key];
                }
            }
        });
    }

    const country = localStorage.getItem('rte_country') || 'VE';
    countrySelect.value = country;
    setLang(countrySelect.value === 'US' ? 'en' : 'es');
    updatePhone();
</script>
</body>
</html>
