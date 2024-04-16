@extends('layouts.app')

@section('content')

<h1>Nuevo Artículo</h1>

    <form action="{{ route('article.store') }}"  method="POST">
        @csrf

        <div class="mb-3">
            <label  class="form-label">Título</label>
            <input type="text" class="form-control" name="title" />
        </div>

        <div class="mb-3">
            <label  class="form-label">Contenido</label>
            <input type="text" class="form-control" name="content" />
        </div>

        <div class="mb-3">
            <label  class="form-label">Fecha</label>
            <input type="date" class="form-control" name="date" />
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
