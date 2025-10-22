@props([
    'text' => 'Click Me',
    'color' => 'white',
    'link' => '#',
])

<div
    class="relative flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group hover:scale-105 ">
    <a href="{{ route($link) }}"
        class="relative w-fit px-6 py-3 flex items-center justify-center font-medium text-black group bg-[#f37021] group-hover:bg-[#a63e00] transition duration-300">
        <span class="font-light text-white poppins-regular">
            {{ $text }}
        </span>
    </a>
    <div class="absolute w-full h-6 px-[71px] border-t border-l border-r border-white -top-1"></div>
    <div class="absolute w-full h-6 px-[71px] border-b border-l border-r border-white -bottom-1"></div>
    <div class="absolute bottom-0 w-[6px] h-[6px] bg-white right-1 group-hover:flex hidden transition duration-300">

    </div>
</div>
