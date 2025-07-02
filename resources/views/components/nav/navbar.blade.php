<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company" class="h-8 w-8" />
                </div>
                <div class="hidden md:block ml-10 flex items-baseline space-x-4">
                    <x-nav-link href="{{ route('signup') }}" :active="request()->routeIs('signup')">
                        Sign up
                    </x-nav-link>
                    <x-nav-link href="{{ route('game') }}" :active="request()->routeIs('game')">
                        Game
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile menu panel --}}
    <div :class="{'block': open, 'hidden': !open}" class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <x-nav-link href="{{ route('signup') }}" :active="request()->routeIs('signup')" mobile>
                Sign up
            </x-nav-link>
            <x-nav-link href="{{ route('game') }}" :active="request()->routeIs('game')" mobile>
                Game
            </x-nav-link>
        </div>
    </div>
</nav>
