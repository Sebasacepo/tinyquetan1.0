<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
@extends('layouts.app')

@section('content')

<h1>Nuevo Comentario</h1>

    <form action="{{ route('comment.store') }}"  method="POST">
        @csrf

        <div class="mb-3">
            <label  class="form-label">Articulo</label>
            <select class="form-control" name ="article_id">
                @foreach ($articles as $article)
                    <option value = "{{$article->id}}">{{$article->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label  class="form-label">Contenido</label>
            <input type="text" class="form-control" name="content" />
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" onclick="cancelar()">Cancelar</button>
    </form>

@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

