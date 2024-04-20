@extends('layouts.app')

@section('content')

<h1>Editar Blog</h1>

    <form action="{{ route('blog.update') }}"  method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name = "blog_id" value ="{{$blog -> id}}" required>

        <div class="mb-3">
            <label  class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" value={{ $blog -> titulo}} required/>
        </div>

        <div class="mb-3">
            <label  class="form-label">Descripción</label>
            <input type="text" class="form-control" name="describcion" value={{ $blog -> describcion }} required/>
        </div>

        <div class="mb-3">
            <label  class="form-label">Categoría</label>
            <input type="text" class="form-control" name="category" value={{ $blog -> category }} required/>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
