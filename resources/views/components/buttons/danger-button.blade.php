<button {{ $attributes->merge(['type' => 'submit', 'class' => '
    inline-flex
    items-center
    px-2
    py-1
    bg-red-600
    text-white
    border
    border-transparent
    rounded
    font-bold
    text-xs
    uppercase
    tracking-widest
    hover:bg-red-600
    active:bg-red-600
    focus:outline-none
    focus:ring-2
    focus:ring-red-500
    focus:ring-offset-2
    transition
    ease-in-out
    delay-150
    duration-500
    duration-1
    dark:hover:bg-red-700
    dark:focus:ring-offset-gray-800
']) }}>
    {{ $slot }}
</button>
