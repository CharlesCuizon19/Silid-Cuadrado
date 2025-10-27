@props([
    'products' => [],
])

<div class="grid grid-cols-1 gap-4">
    <div class="text-lg poppins-regular">
        You Might Also Like
    </div>

    <div class="grid w-full grid-cols-3">
        @foreach ($products as $item)
            <a href="{{ route('products.details', ['id' => $item->id]) }}" class="swiper-slide">
                <div class="flex flex-col gap-5 cursor-pointer group">
                    <div class="relative h-auto w-[490px]">
                        <div class="overflow-hidden">
                            <img src="{{ asset($item->thumbnail) }}" alt=""
                                class="object-cover w-full h-auto transition duration-500 ease-in-out group-hover:scale-105">
                        </div>
                        <div
                            class="absolute inset-0 transition duration-500 ease-in-out opacity-0 bg-black/50 group-hover:opacity-100">
                            <div class="flex justify-center h-full">
                                <div class="flex items-center justify-center gap-3 poppins-regular">
                                    <div class="text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M21 21l-4.35-4.35m1.1-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                                        </svg>
                                    </div>
                                    <div class="text-white">
                                        View Product
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="text-2xl transition duration-500 ease-in-out magistral-medium group-hover:text-[#f37021]">
                        {{ $item->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
