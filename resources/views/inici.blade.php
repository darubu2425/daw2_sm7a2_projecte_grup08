<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Màsters</title>
</head>
<body>
    <h1>Benvingut a l'aplicació de Gestió de Màsters</h1>
    
    @if (Route::has('login'))
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Iniciar sessió</a><br>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Registrar-se</a>
            @endif
        @endauth
    @endif
    <br>
    <a href="{{ route('info') }}">Més informació</a>
</body>
</html>