@extends('layouts.app')
@section('content')

    <h1>Blogs</h1>

    <a href="{{ route('blog.create') }}" class="btn btn-primary">Nuevo blog</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->titulo }}</td>
                    <td>{{ $blog->describcion }}</td>
                    <td>{{ $blog->category }}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blog->id )}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('blog.delete', $blog->id )}}" style = "display.contents" method = "POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btnDelete"> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="module">

        $(document).ready(function () {

            $('.btnDelete').click(function (event) {

                event.preventDefault();

                const form = $(this).closest('form');

                Swal.fire({

                    title: "¿Desea eliminar el registro?",
                    text: "No podrá revertirlo",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si"

                    }).then((result) => {

                        if (result.isConfirmed) {

                            form.submit();
                        }
                    });
            });

        });

    </script>

@include('layouts.foot')
@endsection
