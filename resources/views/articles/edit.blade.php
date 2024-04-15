@extends('layouts.app')

@section('content')

<h1>Editar Articulo</h1>

    <form action="{{ route('article.update') }}"  method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name = "article_id" value ="{{$article -> id}}">

        <div class="mb-3">
            <label  class="form-label">Titulos</label>
            <input type="text" class="form-control" name="title" value={{ $article -> title}}/>
        </div>

        <div class="mb-3">
            <label  class="form-label">Contenidos</label>
            <input type="text" class="form-control" name="content" value={{ $article -> content }} />
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
