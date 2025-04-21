<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informació</title>
</head>
<body>
    <h1>Funcionament de l'aplicació</h1>
    <p>Rols:</p>
    <ul>
        <li><strong>Admin</strong>: Pot gestionar masters i alumnes.</li>
        <li><strong>Consultor</strong>: Només pot visualitzar dades.</li>
    </ul>
    <a href="{{ route('inici') }}">Tornar a l'inici</a>
</body>
</html>