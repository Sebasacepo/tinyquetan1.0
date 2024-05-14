
@extends('layouts.app')

@section('content')
    <h1>Articulos</h1>

    <a href="{{ route('article.create') }}" class="btn btn-primary">Nuevo articulo</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>{{ $article->date }}</td>
                    <td>
                        <a href="{{ route('article.edit', $article->id )}}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('article.delete', $article->id )}}" style = "display.contents" method = "POST">
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
