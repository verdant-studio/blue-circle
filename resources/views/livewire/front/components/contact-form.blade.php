<section>
    @if (session('success'))
        <x-message-success>{{ session('success') }}</x-message-success>
    @endif

    @if (session('error'))
        <x-message-error>{{ session('error') }}</x-message-error>
    @endif

    <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
        <form wire:submit.prevent="submit" action="/contact" method="POST" class="w-full">
            @csrf

            <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="email">{{ __('contact.form.email') }} *</label>
                    <input id="email" name="email" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="email">
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="name">{{ __('general.name') }} *</label>
                    <input id="name" name="name" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="name">
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="messageContent">{{ __('contact.form.message') }} *</label>
                    <textarea id="messageContent" name="messageContent" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="messageContent"></textarea>
                    <x-jet-input-error for="messageContent" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-slate-100 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                <x-button>
                    {{ __('contact.form.submit') }}
                </x-button>
            </div>
        </form>

    </div>
</section>

