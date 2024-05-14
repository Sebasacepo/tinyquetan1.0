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

<h1>Editar Articulo</h1>

    <form action="{{ route('article.update') }}"  method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name = "article_id" value ="{{$article -> id}}" required>

        <div class="mb-3">
            <label  class="form-label">Titulos</label>
            <input type="text" class="form-control" name="title" value={{ $article -> title}} required/>
        </div>

        <div class="mb-3">
            <label  class="form-label">Contenidos</label>
            <input type="text" class="form-control" name="content" value={{ $article -> content }} required/>
        </div>

        <div class="mb-3">
            <label  class="form-label">Blog</label>
            <input type="text" class="form-control" name="blog_id" value={{ $article -> blog_id }} required/>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
