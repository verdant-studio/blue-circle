@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-white text-base font-medium text-white bg-sky-400 focus:outline-none focus:bg-sky-500 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-slate-800 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:text-slate-800 focus:bg-slate-50 focus:border-slate-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
