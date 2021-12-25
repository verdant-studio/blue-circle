@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-white text-sm font-medium font-display leading-5 text-white focus:outline-none focus:border-white transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium font-display leading-5 text-white hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
