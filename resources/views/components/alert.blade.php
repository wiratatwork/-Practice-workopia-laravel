@props(['type' => 'success', 'message' => ''])

@php
    $colors = [
        'success' => [
            'bg' => 'bg-green-50',
            'border' => 'border-green-200',
            'text' => 'text-green-800',
            'icon' => 'fa-circle-check',
            'icon_color' => 'text-green-500'
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-200',
            'text' => 'text-red-800',
            'icon' => 'fa-circle-exclamation',
            'icon_color' => 'text-red-500'
        ],
    ][$type] ?? ['bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'text' => 'text-blue-800', 'icon' => 'fa-info-circle', 'icon_color' => 'text-blue-500'];
@endphp

<div 
    x-data="{ show: true }" 
    x-init="setTimeout(() => show = false, 5000)" 
    x-show="show"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="{{ $colors['bg'] }} {{ $colors['border'] }} border-l-4 p-4 rounded-r-lg shadow-sm flex items-center justify-between mb-6"
>
    <div class="flex items-center">
        <i class="fa-solid {{ $colors['icon'] }} {{ $colors['icon_color'] }} mr-3 text-lg"></i>
        <p class="text-sm font-medium {{ $colors['text'] }}">
            {{ $message }}
        </p>
    </div>
    <button @click="show = false" class="text-gray-400 hover:text-gray-600 transition-colors">
        <i class="fa-solid fa-xmark text-sm"></i>
    </button>
</div>
