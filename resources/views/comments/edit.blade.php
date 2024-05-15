
@extends('layouts.app')

@section('content')

<h1>Editar Comentario</h1>

    <form action="{{ route('comment.update') }}"  method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name = "comment_id" value="{{$comment->id}}" required>

        <div class="mb-3">
            <label  class="form-label">Articulo</label>
            <select class="form-control" name ="article_id">
                @foreach ($articles as $article)
                    <option value = "{{$article->id}}" {{$article->id == $comment->article_id ? 'selected':' '}}>{{$article->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label  class="form-label">Contenidos</label>
            <input type="text" class="form-control" name="content" value={{ $comment->comment_content }} required/>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
