@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="grid grid-cols-3 gap-4">
    <!-- Gestión Usuarios -->
    <a href="{{ route('users.index') }}" class="btn btn-primary">
        👥 Gestió d'Usuaris
    </a>
    
    <!-- Gestión Másters -->
    <a href="{{ route('masters.index') }}" class="btn btn-primary">
        🎓 Gestió de Màsters
    </a>
    
    <!-- Gestión Alumnes -->
    <a href="{{ route('alumnes.index') }}" class="btn btn-primary">
        👨‍🎓 Gestió d'Alumnes
    </a>
</div>
</div>
@endsection