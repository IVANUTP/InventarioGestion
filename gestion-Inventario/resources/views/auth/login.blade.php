<x-guest-layout>


            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Bienvenido
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Inicia sesión para continuar
                </p>
            </div>


            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="email" value="Correo electrónico" />
                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        class="mt-1 block w-full rounded-lg"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="password" value="Contraseña" />
                    <x-text-input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="mt-1 block w-full rounded-lg"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                               class="rounded border-gray-300 text-gray-800 focus:ring-gray-700">
                        <span class="ml-2 text-gray-600">Recordarme</span>
                    </label>
                </div>

                <!-- Botón -->
                <x-primary-button class="w-full justify-center py-3 text-base rounded-lg">
                    Iniciar sesión
                </x-primary-button>


                @if (Route::has('register'))
                    <p class="text-center text-sm text-gray-600">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}"
                           class="font-medium text-gray-800 hover:underline">
                            Regístrate
                        </a>
                    </p>
                @endif
            </form>

</x-guest-layout>
