<x-admin-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/darkmode.js', 'resources/js/bookmarks.js' ])
        <div class="w-full text-gray-900 dark:text-gray-100">
            @yield('content')
        </div>
</x-admin-layout>

