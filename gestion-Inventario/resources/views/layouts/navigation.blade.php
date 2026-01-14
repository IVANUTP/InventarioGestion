<aside
    :class="{
        'translate-x-0': mobileMenu,
        '-translate-x-full': !mobileMenu,
        'w-64': open,
        'w-20': !open
    }"
    class="bg-white border-r transition-all duration-300
           fixed sm:static inset-y-0 left-0 z-40
           transform sm:translate-x-0 flex flex-col">

    <!-- HEADER -->
    <div class="flex items-center justify-between p-4 border-b">
        <span x-show="open" class="text-lg font-bold text-gray-700">
            Panel
        </span>

        <button @click="open = !open" class="hidden sm:block text-gray-500">
            ☰
        </button>
    </div>

    <!-- LINKS -->
    <nav class="p-4 space-y-2 flex-1"> <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0 0H7m4 0h4" />
            </svg> <span x-show="open">Dashboard</span> </a> <a href="{{ route('categoria.index') }}"
            class="flex items-center gap-3 p-2 rounded-lg {{ request()->routeIs('categoria.*') ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg> <span x-show="open">Categorías</span> </a> <a href="{{ route('productos.index') }}"
            class="flex items-center gap-3 p-2 rounded-lg {{ request()->routeIs('productos.*') ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg> <span x-show="open">Productos</span> </a> </nav>


    <div class="border-t p-4">
        <div class="flex items-center gap-3">


            <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center">
                <span class="font-bold text-indigo-600 text-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
            </div>

            <div x-show="open" class="flex-1">
                <p class="text-sm font-semibold text-gray-800">
                    {{ Auth::user()->name }}
                </p>

                <p class="text-xs text-gray-500">
                    {{ Auth::user()->email }}
                </p>

                <p class="text-xs text-gray-400">
                    Miembro desde:
                    {{ Auth::user()->created_at->format('d/m/Y') }}
                </p>
            </div>

        </div>

        <div x-show="open" class="mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left text-sm text-red-500 hover:bg-red-50 px-3 py-2 rounded-lg transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

</aside>
