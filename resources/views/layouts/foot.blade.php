<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!--codigo blade-->

    @include('layouts.head')

    <footer style="background-color: black; color:white">
        <div class="min-h-screen bg-gray-100">            <!-- Page Heading -->
        <footer>
            <div class="container">
            <div class="row">
                <div class="col-md-4">
                <h5>Contáctanos</h5>
                <ul class="list-unstyled">
                    <li><strong>Correo electrónico:</strong> info@miempresa.com</li>
                    <li><strong>Teléfono:</strong> +1234567890</li>
                    <li><strong>Dirección:</strong> Calle Principal, Ciudad, País</li>
                </ul>
                </div>
                <div class="col-md-4">
                <h5>Enlaces útiles</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                </ul>
                </div>
                <div class="col-md-4">
                <h5>Síguenos</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="bi bi-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="bi bi-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="bi bi-instagram"></i> Instagram</a></li>
                </ul>
                </div>
            </div>
            </div>
        </footer>
            <div class="container">    
                @yield('content')
            </div>
        </div>


        @include('layouts.scripts')
    </body>
</html>
