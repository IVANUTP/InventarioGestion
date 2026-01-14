@php
    $icons = [
        'success' => [
            'bg' => 'bg-green-100',
            'text' => 'text-green-600',
            'border' => 'border-green-500',
            'title' => 'Operación exitosa',
            'icon' => 'check-circle',
        ],
        'error' => [
            'bg' => 'bg-red-100',
            'text' => 'text-red-600',
            'border' => 'border-red-500',
            'title' => 'Ocurrió un error',
            'icon' => 'x-circle',
        ],
        'warning' => [
            'bg' => 'bg-yellow-100',
            'text' => 'text-yellow-600',
            'border' => 'border-yellow-500',
            'title' => 'Advertencia',
            'icon' => 'exclamation-triangle',
        ],
        'info' => [
            'bg' => 'bg-blue-100',
            'text' => 'text-blue-600',
            'border' => 'border-blue-500',
            'title' => 'Información',
            'icon' => 'information-circle',
        ],
    ];

    $config = $icons[$type] ?? $icons['success'];
@endphp

@if ($message)
<div
    x-data="{ open: true }"
    x-init="setTimeout(() => open = false, 1000)"
    x-show="open"
    x-transition
    class="fixed inset-0 flex items-center justify-center z-50"
>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Modal -->
    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-md p-6 border-t-4 {{ $config['border'] }}">
        <div class="flex flex-col items-center text-center gap-3">

            <!-- Icono -->
            <div class="w-14 h-14 flex items-center justify-center rounded-full {{ $config['bg'] }}">
                @if ($config['icon'] === 'check-circle')
                    <svg class="w-8 h-8 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m7 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                @elseif ($config['icon'] === 'x-circle')
                    <svg class="w-8 h-8 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                @elseif ($config['icon'] === 'exclamation-triangle')
                    <svg class="w-8 h-8 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a1 1 0 00.86 1.5h18.64a1 1 0 00.86-1.5L13.71 3.86a1 1 0 00-1.72 0z"/>
                    </svg>
                @else
                    <svg class="w-8 h-8 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                    </svg>
                @endif
            </div>

            <!-- Texto -->
            <h2 class="text-lg font-bold text-gray-800">
                {{ $config['title'] }}
            </h2>

            <p class="text-gray-600 font-semibold">
                {{ $message }}
            </p>
        </div>
    </div>
</div>
@endif
