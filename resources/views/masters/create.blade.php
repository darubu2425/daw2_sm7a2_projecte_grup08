@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nou Màster</h1>
    
    <form action="{{ route('masters.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom del Màster</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="hores" class="form-label">Hores</label>
            <input type="number" class="form-control" id="hores" name="hores" required>
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control" id="director" name="director" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('masters.index') }}" class="btn btn-secondary">Cancel·lar</a>
    </form>
</div>
@endsection