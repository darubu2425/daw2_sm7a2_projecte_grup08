@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('masters.create') }}" class="btn btn-primary">Nou Màster</a>
        <a href="{{ route('alumnes.create') }}" class="btn btn-primary">Nou Alumne</a>
    </div>
</div>
@endsection