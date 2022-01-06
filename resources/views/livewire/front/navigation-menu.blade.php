<nav x-data="{ open: false }" class="mb-8 text-white border-b bg-sky-800 border-sky-600 lg:mb-16">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl">
        <div class="flex justify-between h-16">
            <div class="flex w-full">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-jet-application-logo class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden w-full space-x-8 sm:justify-between sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>

                    <div class="space-x-8 sm:flex">
                        @if (Route::has('login'))
                            @auth
                                <x-jet-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                    {{ __('dashboard._') }}
                                </x-jet-nav-link>
                            @else
                                <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                    {{ __('auth.login') }}
                                </x-jet-nav-link>

                                @if (Route::has('register'))
                                    <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                        {{ __('auth.register') }}
                                    </x-jet-nav-link>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-white transition rounded-md hover:bg-sky-700 focus:outline-none focus:bg-sky-700">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pb-1 border-t border-sky-700">
            <div class="mt-3 space-y-1">
                @if (Route::has('login'))
                    @auth
                        <x-jet-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                            {{ __('dashboard._') }}
                        </x-jet-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('auth.logout') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    @else
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('auth.login') }}
                        </x-jet-responsive-nav-link>

                        @if (Route::has('register'))
                            <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                {{ __('auth.register') }}
                            </x-jet-responsive-nav-link>
                        @endif
                    @endauth
                @endif

            </div>
        </div>
    </div>
</nav>
