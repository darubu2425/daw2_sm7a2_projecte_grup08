@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalls del Màster</h1>
    <div class="card">
        <div class="card-body">
            <table class="table">
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
            <a href="{{ route('masters.index') }}" class="btn btn-secondary">Tornar</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('masters.edit', $master->identificador) }}" class="btn btn-warning">Editar</a>
            @endif
        </div>
    </div>
</div>
@endsection