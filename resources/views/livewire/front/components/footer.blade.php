<footer class="min-h-full mt-8 bg-sky-900 lg:mt-16">
    <div class="p-4 py-6 mx-auto md:py-8 max-w-7xl">
        <div class="grid gap-4 md:gap-8 md:grid-cols-3">
            <div>
                <h3 class="mb-4 text-xl font-semibold leading-tight text-white">
                    {{ config('app.name', 'Laravel') }}
                </h3>
                @if (isset($siteDescription))
                    <p class="text-white">{{ $siteDescription }}</p>
                @endif
            </div>
            <div class="md:col-span-2">
                <h3 class="mb-4 text-xl font-semibold leading-tight text-white">Links</h3>
                <ul class="flex flex-col space-y-2 text-white">
                    @foreach($pages as $page)
                        <li>
                            <a class="hover:text-yellow-400" href="{{ route('page', $page->slug) }}">
                                {{ $page->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-sky-900">
        <div class="p-4 mx-auto text-center text-white max-w-7xl">
            <small class="text-sm">Powered by <a class="hover:text-sky-200" href="https://verdant.studio/portfolio/blue-circle/" target="_blank" rel="noreferrer noopener">Blue Circle</a></small>
        </div>
    </div>
</footer>
