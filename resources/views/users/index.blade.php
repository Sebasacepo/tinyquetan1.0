@extends('layout/template')

@section('title', 'Registro de usuarios')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>Listado de Usuarios</h2>

        <a href="" class="btn btn-primary btn-sm" class="btn btn-primary btn-sm">Nuevo registro</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nombre</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tipo }}</td>
                        <td><a href="{{ url('users/'.$user->id.'/edit' ) }}" class="btn btn-warning btn-sm">Editar</a></td>
                        <td>
                            <form action="{{ url('users/' .$user->id) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</main>
