<nav x-data="{ open: false }" class="text-white border-b bg-sky-800 border-sky-600">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-jet-application-logo class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @can('dashboard read')
                        <x-jet-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                            {{ __('dashboard._') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('users read')
                        <x-jet-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                            {{ __('users._plural') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('sites read')
                        <x-jet-nav-link href="{{ route('admin.sites.index') }}" :active="request()->routeIs('admin.sites.index')">
                            {{ __('sites._plural') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('categories read')
                        <x-jet-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')">
                            {{ __('categories._plural') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('pages read')
                        <x-jet-nav-link href="{{ route('admin.pages.index') }}" :active="request()->routeIs('admin.pages.index')">
                            {{ __('pages._plural') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('blog read')
                        <x-jet-nav-link href="{{ route('admin.blog.index') }}" :active="request()->routeIs('admin.blog.index')">
                            {{ __('blog._singular') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('settings read')
                        <x-jet-nav-link href="{{ route('admin.settings.show') }}" :active="request()->routeIs('admin.settings.show')">
                            {{ __('settings._plural') }}
                        </x-jet-nav-link>
                    @endcan
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ml-3">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition bg-white border border-transparent rounded-md text-slate-500 hover:bg-slate-50 hover:text-slate-700 focus:outline-none focus:bg-slate-50 active:bg-slate-50">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-slate-300"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-slate-300">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition rounded-md bg-sky-900 hover:bg-sky-700 focus:outline-none">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-slate-900">
                                {{ __('profile.manageAccount') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('profile._') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-slate-300"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('auth.logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
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
            @can('dashboard read')
                <x-jet-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    {{ __('dashboard._') }}
                </x-jet-responsive-nav-link>
            @endcan
            @can('users read')
                <x-jet-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                    {{ __('users._plural') }}
                </x-jet-responsive-nav-link>
            @endcan
            @can('sites read')
                <x-jet-responsive-nav-link href="{{ route('admin.sites.index') }}" :active="request()->routeIs('admin.sites.index')">
                    {{ __('sites._plural') }}
                </x-jet-responsive-nav-link>
            @endcan
            @can('categories read')
                <x-jet-responsive-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')">
                    {{ __('categories._plural') }}
                </x-jet-responsive-nav-link>
            @endcan
            @can('pages read')
                <x-jet-responsive-nav-link href="{{ route('admin.pages.index') }}" :active="request()->routeIs('admin.pages.index')">
                    {{ __('pages._plural') }}
                </x-jet-responsive-nav-link>
            @endcan
            @can('blog read')
                <x-jet-responsive-nav-link href="{{ route('admin.blog.index') }}" :active="request()->routeIs('admin.blog.index')">
                    {{ __('blog._singular') }}
                </x-jet-responsive-nav-link>
            @endcan
            @can('settings read')
                <x-jet-responsive-nav-link href="{{ route('admin.settings.show') }}" :active="request()->routeIs('admin.settings.show')">
                    {{ __('settings._plural') }}
                </x-jet-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-sky-700">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="mr-3 shrink-0">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('profile._') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('auth.logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-slate-300"></div>

                    <div class="block px-4 py-2 text-xs">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-slate-300"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
