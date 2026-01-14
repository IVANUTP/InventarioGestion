<x-guest-layout>



            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Crear cuenta
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Regístrate para comenzar
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="name" value="Nombre completo" />
                    <x-text-input
                        id="name"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        class="mt-1 block w-full rounded-lg"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="email" value="Correo electrónico" />
                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
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
                        autocomplete="new-password"
                        class="mt-1 block w-full rounded-lg"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" value="Confirmar contraseña" />
                    <x-text-input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        class="mt-1 block w-full rounded-lg"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <x-primary-button class="w-full justify-center py-3 text-base rounded-lg">
                    Registrarse
                </x-primary-button>

                <p class="text-center text-sm text-gray-600">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}"
                       class="font-medium text-gray-800 hover:underline">
                        Inicia sesión
                    </a>
                </p>

            </form>

</x-guest-layout>
