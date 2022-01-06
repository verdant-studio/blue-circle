@props([
    'metaDescription',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $metaDescription }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,600;1,400;1,600&family=Quicksand:wght@700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased bg-slate-50 flex min-h-screen flex-col">
        <header>
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="text-sm text-slate-700 underline dark:text-slate-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-slate-700 underline dark:text-slate-500">{{ __('auth.login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-slate-700 underline dark:text-slate-500">{{ __('auth.register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>

        <main class="flex-1">
            {{ $slot }}
        </main>

        <footer class="bg-slate-900 h-48 min-h-full mt-8 lg:mt-16">
            Test
        </footer>
    </body>
</html>
