<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informació</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #f5f7fa;
            padding: 0;
            margin: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .info-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            margin: 2rem auto;
            max-width: 800px;
            transition: transform 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: #555;
        }
        
        ul {
            list-style-type: none;
            margin-bottom: 2rem;
        }
        
        li {
            background: var(--light-color);
            margin-bottom: 1rem;
            padding: 1.2rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        li:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        li::before {
            content: '•';
            color: var(--accent-color);
            font-size: 2rem;
            margin-right: 1rem;
        }
        
        strong {
            color: var(--secondary-color);
            font-weight: 600;
            margin-right: 0.5rem;
        }
        
        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-container {
            text-align: center;
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .info-card {
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info-card">
            <h1>Funcionament de l'aplicació</h1>
            <p>L'aplicació permet gestionar màsters i alumnes amb diferents nivells d'accés segons el rol de l'usuari:</p>
            
            <ul>
                <li><strong>Admin:</strong> Pot crear, editar i eliminar tant màsters com alumnes. També pot crear i eliminar usuaris nous (Tant Admins com consultors). Accés complet al sistema.</li>
                <li><strong>Consultor:</strong> Només pot visualitzar les dades existents. No pot realitzar cap modificació.</li>
            </ul>
            
            <div class="btn-container">
                <a href="{{ route('inici') }}" class="btn">Tornar a l'inici</a>
            </div>
        </div>
    </div>
</body>
</html>