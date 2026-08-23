<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .auth-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0b0d10; padding: 24px; }
        .auth-card { background: #121418; border: 1px solid #26282c; border-radius: 24px; padding: 48px 40px; width: 100%; max-width: 440px; box-shadow: 0 24px 80px rgba(0,0,0,0.5); }
        .auth-card h1 { font-size: 1.75rem; margin-bottom: 8px; text-align: center; color: #fff; }
        .auth-card .tagline { text-align: center; color: #a1a5ab; margin-bottom: 32px; font-size: 0.9rem; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 8px; color: #a1a5ab; font-weight: 500; }
        .form-group input { width: 100%; padding: 14px 16px; border-radius: 12px; border: 1px solid #33363c; background: #0b0d10; color: #fff; outline: none; transition: border-color 0.2s, box-shadow 0.2s; }
        .form-group input:focus { border-color: #4ade80; box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.12); }
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
        <a href="{{ url('/') }}" class="back">← Volver al inicio</a>
        <h1>Iniciar Sesión</h1>
        <p class="tagline">Accedé a tu cuenta para ver tus órdenes.</p>
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </form>
        <a href="{{ route('register') }}" class="auth-link">¿No tenés cuenta? Registrate</a>
    </div>
</div>
</body>
</html>
