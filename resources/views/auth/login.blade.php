<x-guest-layout>
    <!-- Estado de la Sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden md:max-w-lg mt-10">
        <div class="md:flex">
            <div class="w-full p-4 px-5 py-5">
                <div class="text-center mb-4">
                    <h1 class="text-2xl font-semibold text-gray-700">{{ __('Inicia sesión en tu cuenta') }}</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Dirección de Email -->
                    <div>
                        <x-input-label for="email" :value="__('Correo Electrónico')" />
                        <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg p-2" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Recuérdame -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3">
                            {{ __('Iniciar Sesión') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center mt-6">
        <p class="text-sm text-gray-600">{{ __('¿No tienes una cuenta?') }}
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">{{ __('Regístrate') }}</a>
        </p>
    </div>
</x-guest-layout>
