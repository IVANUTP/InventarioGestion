<div id="edit-{{ $producto->id }}"
    class="fixed inset-0 bg-black/60 hidden target:flex items-center justify-center z-50 px-4">

    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-8 py-6 border-b bg-gray-50">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Editar producto
                </h2>
                <p class="text-sm text-gray-500">
                    Actualiza la información del producto
                </p>
            </div>

            <a href="#" class="text-gray-400 hover:text-gray-600 text-3xl leading-none">
                &times;
            </a>
        </div>

        <!-- BODY -->
        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data"
            class="px-8 py-8 space-y-6">

            @csrf
            @method('PUT')

            <!-- NOMBRE -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 16v-2m8-6h-2M6 12H4m12.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414M16.95 16.95l1.414 1.414M7.05 7.05L5.636 5.636" />
                        </svg>
                    </span>

                    <input type="text" name="nombreEdit" value="{{ $producto->nombre }}"
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        >
                </div>
                @error('nombreEdit')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- DESCRIPCIÓN -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>

                <div class="relative">
                    <span class="absolute top-3 left-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h10" />
                        </svg>
                    </span>

                    <textarea name="descripcionEdit" rows="4"
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                     focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Descripción del producto">{{ $producto->descripcion }}</textarea>
                </div>
                @error('descripcionEdit')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- PRECIO / CANTIDAD -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- PRECIO -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Precio
                    </label>

                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">$</span>
                        <input type="number" step="0.01" name="precioEdit" value="{{ $producto->precio }}"
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                      focus:ring-2 focus:ring-indigo-500">
                    </div>
                    @error('precioEdit')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CANTIDAD -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Cantidad
                    </label>

                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h18v18H3z" />
                            </svg>
                        </span>

                        <input type="number" name="cantidadEdit" value="{{ $producto->cantidad }}"
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                      focus:ring-2 focus:ring-indigo-500">
                    </div>
                    @error('cantidadEdit')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- CATEGORÍA -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Categoría
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </span>

                    <select name="categoria_idEdit"
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                   focus:ring-2 focus:ring-indigo-500">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('categoria_idEdit')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- IMAGEN -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Imagen
                </label>

                @if ($producto->img)
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('storage/' . $producto->img) }}"
                            class="h-24 w-24 rounded-xl object-cover border shadow-sm">
                        <span class="text-sm text-gray-500">Imagen actual</span>
                    </div>
                @endif

                <input type="file" name="imagenEdit"
                    class="w-full text-sm text-gray-600
                              file:mr-4 file:py-3 file:px-5
                              file:rounded-xl file:border-0
                              file:bg-indigo-50 file:text-indigo-700
                              hover:file:bg-indigo-100 transition">
                @error('imagenEdit')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- FOOTER -->
            <div class="flex justify-end gap-4 pt-6 border-t">
                <a href="#"
                    class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700
                          hover:bg-gray-200 transition font-medium">
                    Cancelar
                </a>

                <button type="submit"
                    class="px-7 py-3 rounded-xl bg-indigo-600 text-white
                               hover:bg-indigo-700 transition font-semibold shadow-md">
                    Guardar cambios
                </button>
            </div>

        </form>
    </div>
</div>
