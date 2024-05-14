@extends('layouts.app')

@section('content')
    <h1>Comentarios</h1>

    <a href="{{ route('comment.create') }}" class="btn btn-primary">Nuevo Comentario</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Articulo</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->article->title}}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->date }}</td>
                    <td>
                        <a href="{{ route('comment.edit', $comment->id )}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('comment.delete', $comment->id )}}" style = "display.contents" method = "POST">
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
