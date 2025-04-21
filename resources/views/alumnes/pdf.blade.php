<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalls de l'Alumne {{ $alumne->identificador }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #2c3e50; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .footer { text-align: center; margin-top: 30px; font-size: 0.8em; color: #7f8c8d; }
    </style>
</head>
<body>
    <h1>Detalls de l'Alumne</h1>
    <table>
        <tr>
            <th>ID:</th>
            <td>{{ $alumne->identificador }}</td>
        </tr>
        <tr>
            <th>Nom:</th>
            <td>{{ $alumne->nom }}</td>
        </tr>
        <tr>
            <th>Correu:</th>
            <td>{{ $alumne->correu }}</td>
        </tr>
        <tr>
            <th>Adreça:</th>
            <td>{{ $alumne->adreça }}</td>
        </tr>
        <tr>
            <th>Ciutat:</th>
            <td>{{ $alumne->ciutat }}</td>
        </tr>
        <tr>
            <th>País:</th>
            <td>{{ $alumne->pais }}</td>
        </tr>
        <tr>
            <th>Telèfon:</th>
            <td>{{ $alumne->telefon }}</td>
        </tr>
        <tr>
            <th>Màster:</th>
            <td>{{ $alumne->master->nom }}</td>
        </tr>
    </table>
    <div class="footer">
        Document generat el {{ now()->format('d/m/Y H:i') }} per {{ auth()->user()->name }}
    </div>
</body>
</html>