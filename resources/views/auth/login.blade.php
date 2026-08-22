<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .auth-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #0b0d10; padding: 24px; }
        .auth-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 40px; width: 100%; max-width: 420px; }
        .auth-card h1 { font-size: 1.5rem; margin-bottom: 24px; text-align: center; }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 0.875rem; margin-bottom: 6px; color: #a1a5ab; }
        .form-group input { width: 100%; padding: 12px 14px; border-radius: 10px; border: 1px solid #26282c; background: #0b0d10; color: #fff; }
        .btn-block { width: 100%; margin-top: 8px; }
        .auth-link { text-align: center; display: block; margin-top: 16px; color: #a1a5ab; }
        .error { color: #ff5a5a; font-size: 0.875rem; margin-bottom: 12px; }
    </style>
</head>
<body>
<div class="auth-page">
    <div class="auth-card">
        <h1>Iniciar Sesión</h1>
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
