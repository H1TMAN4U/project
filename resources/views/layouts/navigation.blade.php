<nav :class="{ 'block': open, 'hidden': !open }" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
    <x-search-recipes></x-search-recipes>
    <x-admin-link
    class="mt-0"
    :href="route('/')" :active="request()->routeIs('/')">
    Home
</x-admin-link>
@auth
<x-admin-link
    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
    :href="route('bookmarks')" :active="request()->routeIs('bookmarks')">
    Bookmarks
</x-admin-link>
@endauth

    {{-- <div class="px-2 py-2 mt-4 bg-white rounded-md shadow dark:bg-gray-700">
        <x-admin-link
            class="mt-0"
            :href="route('/')" :active="request()->routeIs('/')">
            Home
        </x-admin-link>
        @auth
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('bookmarks')" :active="request()->routeIs('bookmarks')">
            Bookmarks
        </x-admin-link>
        @endauth
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('breakfast')"  :active="request()->routeIs('breakfast')">
            {{ __('Breakfast') }}
        </x-admin-link>
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('lunch')" :active="request()->routeIs('lunch')">
            {{ __('Lunch') }}
        </x-admin-link>
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('dessert')">
            {{ __('Dessert') }}
        </x-admin-link>
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('dinner')">
            {{ __('Dinner') }}
        </x-admin-link>
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('snacks')">
            {{ __('Snacks') }}
        </x-admin-link>
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('drinks')">
            {{ __('Drinks') }}
        </x-admin-link>
        <x-admin-link
            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('all')">
            {{ __('All') }}
        </x-admin-link>

    </div> --}}

    <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open"
            class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <span>{{ __('Recipes') }}</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="z-20 absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">

            <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('breakfast')">
                    {{ __('Breakfast') }}
                </x-dropdown-link>
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('lunch')">
                    {{ __('Lunch') }}
                </x-dropdown-link>
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('dessert')">
                    {{ __('Dessert') }}
                </x-dropdown-link>
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('dinner')">
                    {{ __('Dinner') }}
                </x-dropdown-link>
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('snacks')">
                    {{ __('Snacks') }}
                </x-dropdown-link>
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('drinks')">
                    {{ __('Drinks') }}
                </x-dropdown-link>
                <x-dropdown-link
                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    :href="route('all')">
                    {{ __('All') }}
                </x-dropdown-link>

            </div>

        </div>
    </div>
    @role('Admin')
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>{{ __('Control') }}</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="z-20 absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">

                <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                    <x-dropdown-link
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg
                        dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('recipes.index')">
                        {{ __('Recipes') }}
                    </x-dropdown-link>
                    <x-dropdown-link
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent
                        dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('admin.roles.index')">
                        {{ __('Roles') }}
                    </x-dropdown-link>
                    <x-dropdown-link
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent
                        dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('admin.permissions.index')">
                        {{ __('Permissions') }}
                    </x-dropdown-link>
                    <x-dropdown-link
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent
                        dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('admin.user.index')">
                        {{ __('User') }}
                    </x-dropdown-link>
                </div>
            </div>
        </div>
    @endrole
    <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open"
            class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            @auth
                <span>{{ Auth::user()->name }}</span>
            @endauth
            @guest
                <span>Authentication</span>
            @endguest
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="z-20 absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">

            <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link
                            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @endauth
                @guest
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <x-dropdown-link
                            class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            :href="route('login')">
                            {{ __('Log in') }}
                        </x-dropdown-link>
                    </form>
                    <x-dropdown-link
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('register')">
                        {{ __('Register') }}
                    </x-dropdown-link>
                @endguest
            </div>
        </div>

    </div>
</nav>
