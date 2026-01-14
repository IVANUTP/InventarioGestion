<div class="bg-white shadow-2xl rounded-2xl p-6 lg:col-span-1">

    <!-- HEADER -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo producto
        </h3>

    </div>

    <form action="{{ route('productos.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">
        @csrf

        <!-- NOMBRE -->
        <div>
            <label class="text-sm font-medium text-gray-700 mb-1 block">
                Nombre <span class="text-red-500">*</span>
            </label>

            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </span>

                <input type="text"
                       name="nombre"
                       value="{{ old('nombre') }}"
                       placeholder="Ej. Laptop HP"
                       class="w-full pl-10 pr-4 py-2.5 rounded-lg border
                              {{ $errors->has('nombre') ? 'border-red-500' : 'border-gray-300' }}
                              focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            @error('nombre')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- DESCRIPCIÓN -->
        <div>
            <label class="text-sm font-medium text-gray-700 mb-1 block">
                Descripción
            </label>

            <div class="relative">
                <span class="absolute top-3 left-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                </span>

                <textarea name="descripcion"
                          rows="3"
                          placeholder="Descripción del producto"
                          class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300
                                 focus:ring-2 focus:ring-indigo-500">{{ old('descripcion') }}</textarea>
            </div>

            @error('descripcion')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- PRECIO + CANTIDAD -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- PRECIO -->
            <div>
                <label class="text-sm font-medium text-gray-700 mb-1 block">
                    Precio <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">$</span>

                    <input type="number"
                           step="0.01"
                           name="precio"
                           value="{{ old('precio') }}"
                           placeholder="0.00"
                           class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300
                                  focus:ring-2 focus:ring-indigo-500">
                </div>

                @error('precio')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- CANTIDAD -->
            <div>
                <label class="text-sm font-medium text-gray-700 mb-1 block">
                    Cantidad <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3h18v18H3z"/>
                        </svg>
                    </span>

                    <input type="number"
                           name="cantidad"
                           value="{{ old('cantidad') }}"
                           placeholder="Stock disponible"
                           class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300
                                  focus:ring-2 focus:ring-indigo-500">
                </div>

                @error('cantidad')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- CATEGORÍA -->
        <div>
            <label class="text-sm font-medium text-gray-700 mb-1 block">
                Categoría <span class="text-red-500">*</span>
            </label>

            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                </span>

                <select name="categoria_id"
                        class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300
                               focus:ring-2 focus:ring-indigo-500">
                    <option value="">Seleccionar categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            @error('categoria_id')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- IMAGEN -->
        <div>
            <label class="text-sm font-medium text-gray-700 mb-1 block">
                Imagen <span class="text-gray-400">(opcional)</span>
            </label>

            <input type="file"
                   name="imagen"
                   class="block w-full text-sm text-gray-600
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0
                          file:bg-indigo-50 file:text-indigo-700
                          hover:file:bg-indigo-100">

            @error('imagen')
                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- BOTÓN -->
        <button type="submit"
                class="w-full flex items-center justify-center gap-2
                       bg-indigo-600 hover:bg-indigo-700
                       text-white py-2.5 rounded-lg
                       font-semibold transition shadow-md">

            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"/>
            </svg>

            Guardar producto
        </button>
    </form>
</div>
