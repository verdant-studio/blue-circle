@props(['outline' => false])

@if ($outline)
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-transparent border-2 border-sky-900 rounded-md font-semibold text-xs text-sky-900 uppercase hover:text-white tracking-widest hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-slate-900 focus:ring focus:ring-slate-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@else
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-sky-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-slate-900 focus:ring focus:ring-slate-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@endif
