@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalls de l'Alumne</h1>
    <div class="card">
        <div class="card-body">
            <table class="table">
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
                    <td>{{ $alumne->master->nom }}</td> <!-- Acceso a la relación -->
                </tr>
            </table>
            <div class="card-footer">
                <a href="{{ auth()->user()->role === 'admin' ? route('alumnes.index') : route('alumnes.consultor') }}" class="btn btn-secondary">Tornar</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('alumnes.edit', $alumne->identificador) }}" class="btn btn-warning">Editar</a>
                @endif
                <a href="{{ route('alumnes.exportPdf', $alumne->identificador) }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Exportar a PDF
                </a>
            </div>
        </div>
    </div>
</div>
@endsection