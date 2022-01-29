<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('blog._singular') }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="px-4 mx-auto max-w-7xl">

        @if (session('success'))
            <x-message-success>{{ session('success') }}</x-message-success>
        @endif

        @if (session('error'))
            <x-message-error>{{ session('error') }}</x-message-error>
        @endif

        <div class="flex justify-end mb-8">
            @can('articles create')
                <x-button-link href="{{ route('admin.blog.articles.create') }}">
                    {{ __('general.add-new') }}
                </x-button-link>
            @endcan
        </div>

        <div class="mb-8 border-b border-slate-300">
            <ul class="flex flex-wrap -mb-px" role="tablist">
                <li class="mr-2" role="presentation">
                    <a href="#blog-overview-tab" class="inline-flex items-center py-4 px-4 text-sm font-bold uppercase tracking-wider text-center rounded-t-lg border-b-2 hover:text-slate-700 hover:border-sky-900 group {{ $selectedTab === "blog-overview-tab" ? 'bg-white text-black border-sky-700' : 'bg-slate-200 text-slate-900 border-transparent' }}" data-toggle="tab" wire:click="selectTab('blog-overview-tab')" aria-expanded="false">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="2" xmlns="http://www.w3.org/2000/svg"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>
                        {{ __('blog._singular') }}
                    </a>
                </li>
                <li class="mr-2" role="presentation">
                    <a href="#blog-settings-tab" class="inline-flex items-center py-4 px-4 text-sm font-bold uppercase tracking-wider text-center rounded-t-lg border-b-2 hover:text-slate-700 hover:border-sky-900 group {{ $selectedTab === "blog-settings-tab" ? 'bg-white text-black border-sky-700' : 'bg-slate-200 text-slate-900 border-transparent' }}" data-toggle="tab" wire:click="selectTab('blog-settings-tab')" aria-expanded="false">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        {{ __('blog.settings') }}
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <div aria-labelledby="blog-overview-tab" class="{{ $selectedTab === "blog-overview-tab" ? 'block' : 'hidden' }}" role="tabpanel">
                @livewire('admin.blog.show')
            </div>
            <div aria-labelledby="blog-settings-tab" class="{{ $selectedTab === "blog-settings-tab" ? 'block' : 'hidden' }}" role="tabpanel">
                @livewire('admin.blog.edit')
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

