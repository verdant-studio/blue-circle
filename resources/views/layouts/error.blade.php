<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title . ' | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $description }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,600;1,400;1,600&family=Quicksand:wght@700&display=swap" rel="stylesheet">

        @livewire('front.components.g-a-tracking')

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        @php
            \Carbon\Carbon::setLocale(app()->getLocale());
        @endphp
    </head>
    <body class="flex flex-col min-h-screen antialiased bg-slate-50">
        @livewire('front.navigation-menu')

        <main class="flex-1">
            <div class="px-4 mx-auto max-w-7xl">
                <h1 class="mb-8 text-2xl font-semibold md:text-3xl lg:text-4xl text-sky-800">{{ $title }}</h1>
                <div class="prose md:prose-lg max-w-none">
                    <p>{{ $description }}</p>
                </div>
                @if ($homeLink ?? false)
                    <div class="mt-8">
                        <x-button-link href="{{ route('home') }}">
                            {{ __('general.back-to-homepage') }}
                        </x-button-link>
                    </div>
                @endif
            </div>
        </main>

        @livewire('front.components.footer')

        @livewireScripts
    </body>
</html>
