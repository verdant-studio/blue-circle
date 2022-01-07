<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('sites._singular') . ' - ' . $site->name }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl px-4">

        <div class="flex justify-start mb-8">
            <x-button-link href="{{ route('admin.sites.index') }}">
                {{ __('general.back') }}
            </x-button-link>
        </div>

        <div class="mb-8 border-b border-slate-300">
            <ul class="flex flex-wrap -mb-px" role="tablist">
                <li class="mr-2" role="presentation">
                    <a href="#site" class="inline-flex items-center py-4 px-4 text-sm font-bold uppercase tracking-wider text-center rounded-t-lg border-b-2 hover:text-slate-700 hover:border-sky-900 group {{ $selectedTab === "site" ? 'bg-white text-black border-sky-700' : 'bg-slate-200 text-slate-900 border-transparent' }}" data-toggle="tab" wire:click="selectTab('site')" aria-expanded="false">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="2" xmlns="http://www.w3.org/2000/svg"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>  {{ __('sites._singular') }}
                    </a>
                </li>
                <li class="mr-2" role="presentation">
                    <a href="#settings" class="inline-flex items-center py-4 px-4 text-sm font-bold uppercase tracking-wider text-center rounded-t-lg border-b-2 hover:text-slate-700 hover:border-sky-900 group {{ $selectedTab === "settings" ? 'bg-white text-black border-sky-700' : 'bg-slate-200 text-slate-900 border-transparent' }}" data-toggle="tab" wire:click="selectTab('settings')" aria-expanded="false">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        {{ __('sites.settings') }}
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <div aria-labelledby="site-tab" class="{{ $selectedTab === "site" ? 'block' : 'hidden' }}" role="tabpanel">
                @livewire('admin.sites.form-site', [
                    'site_id' => $site->id
                ])
            </div>
            <div aria-labelledby="settings-tab" class="{{ $selectedTab === "settings" ? 'block' : 'hidden' }}" role="tabpanel">
                @livewire('admin.sites.form-settings', [
                    'site_id' => $site->id
                ])
            </div>
        </div>

        <script>
            document.addEventListener('livewire:load', function () {
                @this.on('selectTab', function (value) {
                    @this.set('selectedTab', value);
                });
            });
        </script>

    </div>
</div>

