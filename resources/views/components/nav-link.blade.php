@props(['url' => '/', 'active' => false])

<a href="{{ $url }}" class="{{ $active ? 'text-yellow-500 font-bold' : 'text-blue-600' }}">
    {{ $slot }}
</a>
