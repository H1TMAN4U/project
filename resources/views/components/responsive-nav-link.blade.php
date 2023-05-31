@props(['active'])

@php
$classes = ($active ?? false)
? '
flex
items-center
w-full
pl-3
pr-4
py-2
font-semibold
text-gray-900
bg-gray-100
rounded
border-transparent
text-left
text-sm
text-gray-600
hover:text-gray-900
focus:text-gray-900
hover:bg-gray-200
focus:bg-gray-200
focus:outline-none
focus:shadow-outline

dark:bg-gray-600
dark:focus:bg-gray-900
dark:focus:text-white
dark:hover:text-white
dark:text-gray-300
transition
duration-500
ease-in-out
'
:'
flex
items-center
w-full
px-4
py-2
text-sm
font-semibold
text-gray-900
bg-transparent
rounded
dark:bg-transparent
dark:hover:bg-gray-600
dark:focus:bg-gray-600
dark:focus:text-white
dark:hover:text-white
dark:text-gray-200
hover:text-gray-900
focus:text-gray-900
hover:bg-gray-100
focus:bg-gray-200
focus:outline-none
focus:shadow-outline
transition
duration-500
ease-in-out
';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
