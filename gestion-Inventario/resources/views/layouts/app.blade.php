<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
       <div x-data="{ open: true, mobileMenu: false }" class="flex min-h-screen">

        <!-- SIDEBAR -->
        @include('layouts.navigation')

        <!-- OVERLAY MÓVIL -->
        <div x-show="mobileMenu" @click="mobileMenu = false" class="fixed inset-0 bg-black/50 z-30 sm:hidden"
            x-transition></div>

        <!-- CONTENIDO -->
        <div class="flex-1 flex flex-col">

            <!-- HEADER -->
              @isset($header)
            <header class="bg-white shadow sticky top-0 z-20">
                <div class="px-6 py-4 flex items-center justify-between">

                    {{ $header }}

                    <!-- Botón móvil -->
                    <button @click="mobileMenu = true" class="sm:hidden p-2 rounded-lg border text-gray-600">
                        ☰
                    </button>
                </div>
            </header>
              @endisset

            <!-- MAIN -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

        </div>

    </div>


     <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
