<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!--codigo blade-->

    @include('layouts.head')

    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">            <!-- Page Heading -->
            <header class="bg-dark shadow">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="http://127.0.0.1:8000/home">TinyQueTan</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">

                            <a class="nav-link active text-white" aria-current="page" href="http://127.0.0.1:8000/home">Inicio</a>

                            <a class="nav-link text-white" href="http://127.0.0.1:8000/articles">Articulo</a>
                            @if (Auth::check() && \App\Helpers\RoleHelper::isAuthorized('Contenidos.showContent'))
                                <a class="nav-link text-white" href="http://127.0.0.1:8000/blogs">Blogs</a>
                            @endif

                            <a class="nav-link text-white" href="http://127.0.0.1:8000/users">Usuarios</a>


                            <a class="nav-link text-white" href="http://127.0.0.1:8000/comments">Comentarios</a>

                            @if (Auth::check() && \App\Helpers\RoleHelper::isAuthorized('Roles.showRoles'))
                            <a class="nav-link text-white" href="http://127.0.0.1:8000/roles">Roles</a>
                        @endif
                        </div>
                        </div>
                        <div>
                            @guest
                                <a href="{{ route('login') }}">Ingresar</a>
                            @endguest

                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Cerrar sesión</button>
                                </form>
                            @endauth
                        </div>

                    </div>
                    </div>

                    </div>

                </nav>
            </header>

            <div class="container">
                <!-- Content here -->
                @yield('content')
            </div>
        </div>


        @include('layouts.scripts')
    </body>
</html>
