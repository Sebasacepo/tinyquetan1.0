@extends('layout/template')

@section('title', 'Registro de usuarios')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>{{ $msg }}</h2>

        <a href="{{ url('users') }}" class="btn btn-secundary">Regresar</a>
    </div>
</main>
