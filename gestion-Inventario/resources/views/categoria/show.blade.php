<div class="bg-white shadow-xl rounded-2xl overflow-hidden lg:col-span-2">

    <div
        class="flex flex-col md:flex-row md:items-center md:justify-between
           gap-4 px-6 py-4 border-b
           bg-gradient-to-r from-indigo-50 to-white">

        <div>
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                Categorías registradas
            </h3>
            <p class="text-sm text-gray-500">
                Administración de categorías del sistema
            </p>
        </div>

        <!-- BUSCADOR -->
        <form method="GET" action="{{ route('categoria.index') }}" class="flex items-center gap-2 w-full md:w-auto">

            <div class="relative w-full md:w-72">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar categoría..."
                    class="w-full pl-10 pr-3 py-2 border rounded-xl
                       focus:ring-2 focus:ring-indigo-500
                       focus:border-indigo-500 text-sm">
            </div>
            <button type="submit"
                class="px-4 py-2 rounded-xl bg-indigo-600 text-white
                   text-sm font-semibold hover:bg-indigo-700 transition">
                Buscar
            </button>

            @if (request('search'))
                <a href="{{ route('categoria.index') }}"
                    class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700
                      text-sm font-semibold hover:bg-gray-300 transition">
                    Recargar
                </a>
            @endif

        </form>
    </div>


    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                    <th class="px-6 py-3 text-center">Imagen</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($categorias as $categoria)
                    <tr class="hover:bg-indigo-50/40 transition">

                        <!-- NOMBRE -->
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $categoria->nombre }}
                        </td>

                        <!-- DESCRIPCIÓN -->
                        <td class="px-6 py-4 text-gray-600 max-w-md">
                            {{ Str::limit($categoria->descripcion, 70) }}
                        </td>

                        <!-- IMAGEN -->
                        <td class="px-6 py-4 text-center">
                            @if ($categoria->img)
                                <img src="{{ asset('storage/' . $categoria->img) }}"
                                    class="h-12 w-12 mx-auto rounded-xl object-cover border shadow-sm">
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs
                                             bg-gray-100 text-gray-500">
                                    Sin imagen
                                </span>
                            @endif
                        </td>

                        <!-- ACCIONES -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <!-- EDITAR -->
                                <a href="#edit-{{ $categoria->id }}"
                                    class="p-2 rounded-lg bg-indigo-100 text-indigo-600
                                          hover:bg-indigo-200 transition"
                                    title="Editar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <!-- ELIMINAR -->
                                <form method="POST" action="{{ route('categoria.destroy', $categoria->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Eliminar categoría?')"
                                        class="p-2 rounded-lg bg-red-100 text-red-600
                                                   hover:bg-red-200 transition"
                                        title="Eliminar">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    @include('categoria.edit', ['categoria' => $categoria])
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- FOOTER -->
    <div class="px-6 py-4 border-t bg-gray-50">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 text-sm text-gray-600">
            <span>
                Mostrando <strong>{{ $categorias->count() }}</strong> de
                <strong>{{ $categorias->total() }}</strong> resultados
            </span>

            <div>
                {{ $categorias->links() }}
            </div>
        </div>
    </div>

</div>
