<div id="edit-{{ $categoria->id }}"
    class="fixed inset-0 bg-black/60 hidden target:flex items-center justify-center z-50 px-4">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-8 py-6 border-b bg-gray-50">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Editar categoría
                </h2>
                <p class="text-sm text-gray-500">
                    Modifica la información de la categoría
                </p>
            </div>

            <a href="#" class="text-gray-400 hover:text-gray-600 text-3xl leading-none">
                &times;
            </a>
        </div>

        <!-- BODY -->
        <form action="{{ route('categoria.update', $categoria) }}" method="POST" enctype="multipart/form-data"
            class="px-8 py-8 space-y-6">

            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <!-- tag icon -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M3 11l9 9a2 2 0 002.828 0l5.586-5.586a2 2 0 000-2.828l-9-9A2 2 0 0010.172 2H5a2 2 0 00-2 2v5.172A2 2 0 003 11z" />
                        </svg>
                    </span>

                    <input type="text" name="nombreEdit" value="{{ $categoria->nombre }}"
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                </div>
                 @error('nombreEdit')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>

                <div class="relative">
                    <span class="absolute top-3 left-3 text-gray-400">
                        <!-- text icon -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h10" />
                        </svg>
                    </span>

                    <textarea name="descripcionEdit" rows="4"
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300
                                     focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Descripción opcional">{{ $categoria->descripcion }}</textarea>

                </div>
                   @error('descripcionEdit')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Imagen -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Imagen
                </label>

                @if ($categoria->img)
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('storage/' . $categoria->img) }}"
                            class="h-24 w-24 rounded-xl object-cover border shadow-sm">
                        <div class="text-sm text-gray-500">
                            Imagen actual
                        </div>
                    </div>
                @endif

                <input type="file" name="img"
                    class="w-full text-sm text-gray-600
                              file:mr-4 file:py-3 file:px-5
                              file:rounded-xl file:border-0
                              file:bg-indigo-50 file:text-indigo-700
                              hover:file:bg-indigo-100 transition">
                @error('imgEdit')
                    <p class="mt-2 text-sm text-red-600 font-medium">
                        {{ $message }}
                    </p>
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
