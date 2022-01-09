<div class="p-6 bg-white border-b border-slate-300 md:py-8 md:px-20">
    <div class="mb-8 flex items-center space-x-4">
        <x-jet-application-logo class="block w-auto h-12" />
        <h2 class="text-lg">{{ __('dashboard.welcome-text') }}</h2>
    </div>

    <div class="mb-4 text-2xl">
        <h2>{{ __('dashboard.welcome-user', ['name' => Auth::user()->name]) }}</h2>
    </div>

    <div class="max-w-2xl">
        <div class="mb-8">
            {{ __('dashboard.welcome-description') }} <a class="font-semibold text-sky-500 hover:text-sky-900" href="https://github.com/verdant-studio/blue-circle" rel="noreferrer noopener" target="_blank">GitHub</a>.
        </div>

        <p class="text-slate-600 italic">{{ __('dashboard.powered-by') }}</p>
    </div>
</div>

