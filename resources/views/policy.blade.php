<x-guest-layout>
    <div class="pt-4 bg-slate-100">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:pt-0">
            <div>
                <x-jet-application-logo />
            </div>

            <div class="w-full p-6 mt-6 overflow-hidden prose bg-white shadow-md sm:max-w-2xl sm:rounded-lg">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>
