<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Màsters</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        @if(auth()->check())
            <div class="text-end mb-4">
                <span class="me-3">Hola, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger">Tancar sessió</a>
            </div>
        @endif

        @yield('content') <!-- Aquí se insertarán tus vistas -->
    </div>
</body>
</html>