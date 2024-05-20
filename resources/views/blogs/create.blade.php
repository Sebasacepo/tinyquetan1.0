@extends('layouts.app')

@section('content')

<h1>Nuevo Artículo</h1>

    <form action="{{ route('blog.store') }}"  method="POST">
        @csrf

        <div class="mb-3">
            <label  class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" />
        </div>

        <div class="mb-3">
            <label  class="form-label">Descripción</label>
            <input type="text" class="form-control" name="describcion" />
        </div>

        <div class="mb-3">
            <label  class="form-label">Categoría</label>
            <input type="text" class="form-control" name="category" />
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{route('blog.index')}}">Cancelar</a>
    </form>

@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
