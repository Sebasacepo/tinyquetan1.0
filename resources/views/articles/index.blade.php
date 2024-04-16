<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TinyQueTan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Inicio</a>
        <a class="nav-link" href="http://127.0.0.1:8000/articles">Articulo</a>
      </div>
    </div>
  </div>
</nav>
@extends('layouts.app')

@section('content')
    <h1>Articulos</h1>

    <a href="{{ route('article.create') }}" class="btn btn-primary">Nuevo autor</a>
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

@endsection

