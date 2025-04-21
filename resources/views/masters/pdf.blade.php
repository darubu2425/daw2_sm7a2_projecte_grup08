<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalls del Màster {{ $master->identificador }}</title>
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
    <h1>Detalls del Màster</h1>
    <table>
        <tr>
            <th>ID:</th>
            <td>{{ $master->identificador }}</td>
        </tr>
        <tr>
            <th>Nom:</th>
            <td>{{ $master->nom }}</td>
        </tr>
        <tr>
            <th>Hores:</th>
            <td>{{ $master->hores }} h</td>
        </tr>
        <tr>
            <th>Director:</th>
            <td>{{ $master->director }}</td>
        </tr>
    </table>
    <div class="footer">
        Document generat el {{ now()->format('d/m/Y H:i') }} per {{ auth()->user()->name }}
    </div>
</body>
</html>