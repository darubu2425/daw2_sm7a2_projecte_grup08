@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llista d'Alumnes</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('alumnes.create') }}" class="btn btn-success mb-3">Nou Alumne</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Màster</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnes as $alumne)
                <tr>
                    <td>{{ $alumne->identificador }}</td>
                    <td>{{ $alumne->nom }}</td>
                    <td>{{ $alumne->master->nom }}</td> <!-- Relación cargada -->
                    <td>
                        <a href="{{ route('alumnes.show', $alumne->identificador) }}" class="btn btn-info">Veure</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('alumnes.edit', $alumne->identificador) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('alumnes.destroy', $alumne->identificador) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Esborrar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection