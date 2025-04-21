<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Màsters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .welcome-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 3rem;
            max-width: 800px;
            text-align: center;
            margin: 2rem;
        }
        .btn-custom {
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            margin: 10px;
            transition: all 0.3s ease;
        }
        .btn-primary-custom {
            background: #4e73df;
            border: none;
        }
        .btn-secondary-custom {
            background: #f8f9fc;
            border: 1px solid #d1d3e2;
            color: #4e73df;
        }
        h1 {
            color: #2e3a59;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        p.lead {
            color: #6c757d;
            margin-bottom: 2rem;
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <h1>Benvingut a l'aplicació de Gestió de Màsters</h1>
        <p class="lead">Sistema integral per a la gestió acadèmica de màsters i alumnes</p>
        
        <div class="d-flex flex-wrap justify-content-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary-custom btn-custom">
                        <i class="fas fa-tachometer-alt"></i> Accedir al Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary-custom btn-custom">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sessió
                    </a>
                @endauth
            @endif
            
            <a href="{{ route('info') }}" class="btn btn-secondary-custom btn-custom">
                <i class="fas fa-info-circle"></i> Més Informació
            </a>
        </div>
    </div>

    <!-- Font Awesome para iconos -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>