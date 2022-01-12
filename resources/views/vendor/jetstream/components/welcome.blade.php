<div class="p-6 text-white border-b rounded-md shadow-md bg-sky-700 border-slate-300 md:pt-8 md:pb-10 md:px-20">
    <div class="flex items-center mb-8 space-x-4">
        <x-jet-application-logo class="block w-auto h-12" />
        <h2 class="text-lg">{{ __('dashboard.welcome-text') }}</h2>
    </div>

    <div class="mb-4 text-2xl">
        <h2>{{ __('dashboard.welcome-user', ['name' => Auth::user()->name]) }}</h2>
    </div>

    <div class="max-w-2xl">
        <div class="mb-8">
            {{ __('dashboard.welcome-description') }} <a class="font-semibold text-sky-200 hover:text-sky-400" href="https://github.com/verdant-studio/blue-circle" rel="noreferrer noopener" target="_blank">GitHub</a>.
        </div>

        <p class="italic text-sky-300">{{ __('dashboard.powered-by') }}</p>
    </div>
</div>

