@props([
    'text' => 'Click Me',
    'border' => '',
    'textcolor' => '',
    'bgcolor' => 'black',
    'bghovercolor' => '',
    'link' => '#',
])

<div
    class="relative flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group hover:scale-105 ">
    <a href="{{ route($link) }}"
        class="relative z-10 overflow-hidden w-fit px-8 py-4 flex items-center justify-center font-medium text-black group bg-{{ $bgcolor }}  transition duration-300">
        <span class="font-light text-{{ $textcolor }} poppins-regular">
            {{ $text }}
        </span>
        <span
            class="absolute -z-10  inset-0 w-0 bg-black/50 skew-x-[-15deg] -left-4  transition-all duration-300 ease-in-out group-hover:w-[calc(100%+30px)] opacity-70"></span>
    </a>
    <div
        class="absolute w-full h-6 px-[71px] {{ $border }} border-t border-l border-r group-hover:border-r-2 group-hover:border-l-2 group-hover:border-t-2 -top-1">
    </div>
    <div
        class="absolute w-full h-6 px-[71px] {{ $border }} border-b border-l border-r -bottom-1 group-hover:border-b-2 group-hover:border-l-2 group-hover:border-r-2">
    </div>
    <div
        class="absolute bottom-0 z-20 w-[6px] h-[6px] bg-{{ $textcolor }} right-1 group-hover:flex hidden transition duration-300">
    </div>
</div>
