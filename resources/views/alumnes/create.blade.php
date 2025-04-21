@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nou Alumne</h1>
    
    <form action="{{ route('alumnes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="correu" class="form-label">Correu Electrònic</label>
            <input type="email" class="form-control" id="correu" name="correu" required>
        </div>
        <div class="mb-3">
            <label for="adreca" class="form-label">Adreça</label>
            <input type="text" class="form-control" id="adreca" name="adreça" required>
        </div>
        <div class="mb-3">
            <label for="ciutat" class="form-label">Ciutat</label>
            <input type="text" class="form-control" id="ciutat" name="ciutat" required>
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Telèfon</label>
            <input type="text" class="form-control" id="telefon" name="telefon" required>
        </div>
        <div class="mb-3">
            <label for="master" class="form-label">Màster</label>
            <select class="form-control" id="master_id" name="master_id" required>
                @foreach($masters as $master)
                    <option value="{{ $master->identificador }}">{{ $master->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('alumnes.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection