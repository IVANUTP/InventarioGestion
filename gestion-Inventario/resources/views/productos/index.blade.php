
<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            @if (session('error'))
                <x-alert type="error" :message="session('error')" />
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Formulario para Categorías -->
                @include('productos.store')

                @include('productos.show')


            </div>
        </div>

    </div>

</x-app-layout>
