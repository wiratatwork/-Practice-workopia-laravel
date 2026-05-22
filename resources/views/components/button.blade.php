@props(['type' => 'primary'])

@php
    $styles = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 shadow-blue-200',
        'secondary' => 'bg-gray-200 text-gray-700 hover:bg-gray-300 shadow-none',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 shadow-red-200',
    ][$type] ?? 'bg-blue-600 text-white hover:bg-blue-700 shadow-blue-200';
@endphp

<button 
    type="submit" 
    class="btn-submit {{ $styles }} px-6 py-2.5 rounded-xl font-bold transition-all transform hover:scale-105 shadow-lg flex items-center justify-center"
>
    {{ $slot }}
</button>

