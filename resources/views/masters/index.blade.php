@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llista de Màsters</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('masters.create') }}" class="btn btn-success mb-3">Nou Màster</a>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Hores</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masters as $master)
                <tr>
                    <td>{{ $master->identificador }}</td>
                    <td>{{ $master->nom }}</td>
                    <td>{{ $master->hores }} h</td>
                    <td>
                        <a href="{{ route('masters.show', $master->identificador) }}" class="btn btn-info btn-sm">Veure</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('masters.edit', $master->identificador) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('masters.destroy', $master->identificador) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur?')">Esborrar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection