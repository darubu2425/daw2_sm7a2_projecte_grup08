@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard de Consultor</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <p>Només pots visualitzar dades.</p>
    <a href="{{ route('masters.consultor') }}" class="btn btn-info">Veure Màsters</a>
</div>
@endsection