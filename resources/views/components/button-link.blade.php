@props([
    'url' => '/', 
    'bgClass' => 'bg-blue-500', 
    'hoverClass' => 'hover:bg-blue-600', 
    'icon' => null
])

<a href="{{ $url }}" 
    @class([
        'inline-flex items-center px-4 py-2 rounded text-white transition-colors',
        $bgClass,
        $hoverClass,
        $attributes->get('class')
    ])
>
    @if($icon)
        <i class="fa-solid {{ $icon }} mr-2"></i>
    @endif
    {{ $slot }}
</a>
