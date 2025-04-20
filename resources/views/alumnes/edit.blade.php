<!-- resources/views/alumnes/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Alumne</h1>
    <form action="{{ route('alumnes.update', $alumne->identificador) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campos similares a create.blade.php -->
        <button type="submit" class="btn btn-primary">Actualitzar</button>
    </form>
</div>
@endsection