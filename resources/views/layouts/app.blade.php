<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Màsters</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para iconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        @if(auth()->check())
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- Botón de retorno (visible siempre excepto en el dashboard) -->
                @if(!request()->routeIs('dashboard'))
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Tornar al Dashboard
                    </a>
                @endif

                <!-- Menú de usuario -->
                <div class="d-flex align-items-center">
                    <span class="me-3">Hola, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-sign-out-alt"></i> Tancar sessió
                        </button>
                    </form>
                </div>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>