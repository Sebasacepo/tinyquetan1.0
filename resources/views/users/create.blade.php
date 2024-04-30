@extends('layout/template')

@section('title', 'Registro de usuarios')

@section('contenido')
<main>
    <div class="container py-4">

        <h2>Registro</h2>
        @if ($errors ->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ url('users') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id=name value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar contraseña</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_confirmation" class="col-sm-2 col-form-label">Confirmar correo</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email_confirmation" id="email_confirmation" value="{{ old('email_confirmation') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="rol" class="col-sm-2 col-form-label">Asignar Rol</label>
                <div class="col-sm-5">
                    <select name="rol" id="rol" class="form-select">
                        <option value="">Seleccionar ROL</option>
                        @foreach ($roles as $rol )
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <a href="{{ url('users') }}" class="btn btn-secundary">Cancelar</a>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
