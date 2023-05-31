<button {{ $attributes->merge(['type' => 'submit', 'class' => '
    inline-flex
    items-center
    px-2
    py-1
    bg-gray-100
    border
    border-transparent
    rounded
    font-bold
    text-xs
    text-gray-700
    uppercase
    tracking-widest
    hover:bg-gray-200
    active:bg-gray-700
    focus:outline-none
    focus:ring-2
    focus:ring-gray-500
    focus:ring-offset-2
    transition
    ease-in-out
    delay-150
    duration-500
    duration-1
    dark:bg-gray-800
    dark:hover:bg-gray-700
    dark:focus:ring-offset-gray-800
    dark:text-white
']) }}>
    {{ $slot }}
</button>

