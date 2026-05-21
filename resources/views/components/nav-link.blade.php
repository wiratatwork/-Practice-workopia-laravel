@props(['url' => '/', 'active' => false])

<a href="{{ $url }}" 
    class="{{ $active 
        ? 'bg-blue-50 text-blue-600 font-semibold' 
        : 'text-gray-500 hover:text-blue-600 hover:bg-gray-50' 
    }} px-4 py-2 rounded-full text-sm transition-all duration-200 ease-in-out">
    {{ $slot }}
</a>
