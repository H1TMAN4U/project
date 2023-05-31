<button {{ $attributes->merge(['type' => 'submit', 'class' => '
    inline-flex
    items-center
    px-2
    py-1
    bg-blue-600
    text-white
    border
    border-transparent
    rounded
    font-bold
    text-xs
    uppercase
    tracking-widest
    hover:bg-blue-700
    active:bg-blue-600
    focus:outline-none
    focus:ring-2
    focus:ring-blue-500
    focus:ring-offset-2
    transition
    ease-in-out
    delay-150
    duration-500
    duration-1
    dark:focus:ring-indigo-600

    dark:bg-indigo-600
    dark:hover:bg-indigo-700
    dark:focus:ring-offset-gray-800
']) }}>
    {{ $slot }}
</button>
