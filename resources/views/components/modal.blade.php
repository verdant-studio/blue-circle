@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-sky-100 shrink-0 sm:mx-0 sm:h-10 sm:w-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-sky-600"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </div>

            <div class="w-full mt-3 sm:mt-0 sm:ml-4">
                <h3 class="text-lg">
                    {{ $title }}
                </h3>

                <div class="mt-2">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-4 text-right bg-slate-100">
        {{ $footer }}
    </div>
</x-jet-modal>
