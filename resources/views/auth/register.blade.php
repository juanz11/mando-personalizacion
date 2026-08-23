<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - RTE Custom Controller</title>
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
        <h1>Crear Cuenta</h1>
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrarme</button>
        </form>
        <a href="{{ route('login') }}" class="auth-link">¿Ya tenés cuenta? Iniciar sesión</a>
    </div>
</div>
</body>
</html>
