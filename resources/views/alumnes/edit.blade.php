@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Alumne</h1>
    <form action="{{ route('alumnes.update', $alumne->identificador) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $alumne->nom) }}" required>
        </div>
        <div class="mb-3">
            <label for="correu" class="form-label">Correu Electrònic</label>
            <input type="email" class="form-control" id="correu" name="correu" value="{{ old('correu', $alumne->correu) }}" required>
        </div>
        <div class="mb-3">
            <label for="adreça" class="form-label">Adreça</label>
            <input type="text" class="form-control" id="adreça" name="adreça" value="{{ old('adreça', $alumne->adreça) }}" required>
        </div>
        <div class="mb-3">
            <label for="ciutat" class="form-label">Ciutat</label>
            <input type="text" class="form-control" id="ciutat" name="ciutat" value="{{ old('ciutat', $alumne->ciutat) }}" required>
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais', $alumne->pais) }}" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Telèfon</label>
            <input type="text" class="form-control" id="telefon" name="telefon" value="{{ old('telefon', $alumne->telefon) }}" required>
        </div>
        <div class="mb-3">
            <label for="master" class="form-label">Màster</label>
            <select class="form-control" id="master_id" name="master_id" required>
                @foreach($masters as $master)
                <option value="{{ $master->identificador }}" 
                    {{ $master->identificador == $alumne->master->identificador ? 'selected' : '' }}>
                    {{ $master->nom }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualitzar</button>
        <a href="{{ route('alumnes.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection
