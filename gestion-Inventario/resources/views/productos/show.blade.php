<div class="bg-white shadow-2xl rounded-2xl overflow-hidden lg:col-span-2">
    <div
        class="flex flex-col lg:flex-row lg:items-center lg:justify-between
           gap-4 px-6 py-4 border-b
           bg-gradient-to-r from-indigo-50 to-white">

        <!-- TITULO -->
        <div>
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                Productos registrados
            </h3>
            <p class="text-sm text-gray-500">
                Control y administración del inventario
            </p>
        </div>

        <!-- ACCIONES -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto">

            <!-- BUSCADOR -->
            <form method="GET" action="{{ route('productos.index') }}" class="flex items-center gap-2 w-full">

                <div class="relative w-full sm:w-72">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar producto..."
                        class="w-full pl-4 pr-3 py-2 border rounded-xl
                           focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500 text-sm">
                </div>

                <button type="submit"
                    class="px-4 py-2 rounded-xl bg-indigo-600 text-white
                       text-sm font-semibold hover:bg-indigo-700 transition">
                    Buscar
                </button>

                @if (request('search'))
                    <a href="{{ route('productos.index') }}"
                        class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700
                           text-sm font-semibold hover:bg-gray-300 transition">
                        Recargar
                    </a>
                @endif
            </form>

            <!-- EXPORTAR EXCEL -->
            <a href="{{ route('productos.export.excel') }}"
                class="px-4 py-2 rounded-xl bg-green-600 text-white
                   text-sm font-semibold hover:bg-green-700 transition
                   flex items-center justify-center gap-2">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>

                Exportar Excel
            </a>
        </div>
    </div>



    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">Producto</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                    <th class="px-6 py-3 text-left">Categoría</th>
                    <th class="px-6 py-3 text-center">Precio</th>
                    <th class="px-6 py-3 text-center">Stock</th>
                    <th class="px-6 py-3 text-center">Imagen</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($productos as $producto)
                    <tr class="hover:bg-indigo-50/40 transition">

                        <!-- PRODUCTO -->
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $producto->nombre }}
                        </td>

                        <!-- DESCRIPCIÓN -->
                        <td class="px-6 py-4 text-gray-600 max-w-md">
                            {{ Str::limit($producto->descripcion, 70) }}
                        </td>

                        <!-- CATEGORÍA -->
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full
                                         text-xs font-medium bg-indigo-100 text-indigo-700">
                                {{ $producto->categoria->nombre }}
                            </span>
                        </td>

                        <!-- PRECIO -->
                        <td class="px-6 py-4 text-center font-semibold text-gray-800">
                            ${{ number_format($producto->precio, 2) }}
                        </td>

                        <!-- STOCK -->
                        <td class="px-6 py-4 text-center">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full
                                         text-xs font-semibold
                                         {{ $producto->cantidad > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $producto->cantidad > 0 ? 'Disponible' : 'Sin stock' }}
                                ({{ $producto->cantidad }})
                            </span>
                        </td>

                        <!-- IMAGEN -->
                        <td class="px-6 py-4 text-center">
                            @if ($producto->img)
                                <img src="{{ asset('storage/' . $producto->img) }}"
                                    class="h-12 w-12 mx-auto rounded-xl object-cover
                                            border shadow-sm hover:scale-105 transition">
                            @else
                                <span
                                    class="inline-flex px-3 py-1 rounded-full text-xs
                                             bg-gray-100 text-gray-500">
                                    Sin imagen
                                </span>
                            @endif
                        </td>

                        <!-- ACCIONES -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <!-- EDITAR -->
                                <a href="#edit-{{ $producto->id }}"
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
                                <form method="POST" action="{{ route('productos.destroy', $producto->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Eliminar categoría?')"
                                        class="p-2 rounded-lg bg-red-100 text-red-600
                                                   hover:bg-red-200 transition"
                                        title="Eliminar">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                    @include('productos.edit', ['producto' => $producto])
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-gray-400">
                            No hay productos registrados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- FOOTER -->
    <div class="px-6 py-4 border-t bg-gray-50">
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 text-sm text-gray-600">
            <span>
                Mostrando <strong>{{ $productos->count() }}</strong> de
                <strong>{{ $productos->total() }}</strong> resultados
            </span>

            <div>
                {{ $productos->links() }}
            </div>
        </div>
    </div>

</div>
