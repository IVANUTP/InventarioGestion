<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         @if (session('message'))
    <x-alert
        :type="session('type')"
        :message="session('message')"
    />
@endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Formulario para Categorías -->
                @include('categoria.store')

                @include('categoria.show')


            </div>
        </div>

    </div>

</x-app-layout>
