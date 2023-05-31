@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex flex-row items-center px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-100 rounded dark:bg-gray-700 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-500 ease-in-out'
            : 'flex flex-row items-center px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded dark:bg-transparent dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-500 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
