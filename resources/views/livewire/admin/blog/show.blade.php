<div>
    <div class="flex justify-end">
        <input class="block w-full max-w-md mt-2 mb-8 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500" placeholder="{{ __('general.search') }}" type="text" wire:model="search">
    </div>

    <div class="mb-8 overflow-hidden border-b rounded-md shadow border-slate-300">
        <table class="min-w-full divide-y divide-slate-300">
            <thead class="text-white bg-sky-600">
                <tr>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.name') }}</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('blog.category') }}</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('blog.owner') }}</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.created-at') }}</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.actions') }}</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-slate-300">
            @foreach ($articles as $article)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $article->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $article->category->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $article->user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @can('articles update')
                            <a class="inline-block text-green-700 align-middle hover:text-green-900" href="{{ route('admin.blog.articles.edit', ['id' => $article->id]) }}">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                <span class="sr-only">{{ __('general.edit') }}</span>
                            </a>
                        @endcan

                        @can('articles delete')
                            <button class="inline-block text-red-600 align-middle hover:text-red-900" wire:click="destroy({{$article->id}})">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span class="sr-only">{{ __('articles.delete') }}</span>
                            </button>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $articles->links() }}
</div>
