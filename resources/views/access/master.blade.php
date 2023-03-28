<x-admin-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dark-light-mode.js', 'resources/js/bookmarks.js' ])
    <div class="bg-gray-50 w-full p-4 dark:bg-gray-900">
        <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-1 text-gray-900 dark:text-gray-100">
                @yield('content')
            </div>
        </div>
    </div>
</x-admin-layout>

