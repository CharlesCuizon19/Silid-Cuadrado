<div>
    <div class="relative z-10 w-full h-full bg-[#f37021]">
        <div>
            <div class="container py-20 mx-auto">
                <div class="flex flex-col gap-5 mx-3 lg:mx-3 2xl:mx-0">
                    <div class="text-xs font-bold uppercase lg:text-xl" data-aos="zoom-in">
                        our products
                    </div>

                    <div class="flex flex-col gap-4 mb-20 lg:items-end lg:flex-row lg:justify-between lg:gap-0"
                        data-aos="zoom-in">
                        <div class="text-2xl lg:text-5xl text-white magistral lg:w-[50%] leading-tight">
                            Reliable Products Built for Strength and Function
                        </div>
                        <div class="ml-3 lg:ml-0" data-aos="zoom-in">
                            <x-button border='border-black' link="products.show" text="All Products" textcolor="black"
                                bgcolor="white" bghovercolor="bg-[#c7c7c7]" />
                        </div>
                    </div>

                    <div class="grid items-end h-full grid-cols-1 gap-3 lg:gap-0 lg:grid-cols-7">
                        <div class="items-end col-span-1" data-aos="zoom-in">
                            <div class="flex gap-3">
                                {{-- navigation --}}
                                <div
                                    class="customize-swiper-prev rounded-full bg-[#515151] hover:bg-white hover:text-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5m0 0l5 5" />
                                    </svg>
                                </div>
                                <div
                                    class="customize-swiper-next rounded-full bg-[#515151] hover:bg-white hover:text-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6" data-aos="zoom-in">
                            <div class="swiper myProductsSwiper max-w-[100%]">
                                <div class="swiper-wrapper">
                                    @foreach ($products as $item)
                                        <a href="{{ route('products.details', ['id' => $item->id]) }}"
                                            class="swiper-slide">
                                            <div class="flex flex-col gap-5 cursor-pointer group">
                                                <div class="relative h-auto w-[414px]">
                                                    <div class="overflow-hidden h-[18rem] w-full">
                                                        <img src="{{ asset($item->thumbnail ?? 'images/no-image.png') }}"
                                                            alt="{{ $item->title }}"
                                                            class="object-cover w-full h-full transition duration-500 ease-in-out group-hover:scale-105">
                                                    </div>
                                                    <div
                                                        class="absolute inset-0 transition duration-500 ease-in-out opacity-0 bg-black/50 group-hover:opacity-100">
                                                        <div class="flex justify-center h-full">
                                                            <div
                                                                class="flex items-center justify-center gap-3 poppins-regular">
                                                                <div class="text-white transition">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="w-5 h-5" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="3"
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
                                                    class="text-2xl transition duration-500 ease-in-out magistral-medium group-hover:text-white">
                                                    {{ $item->title }}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/building.png') }}" alt="" class="w-auto h-full">
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".myProductsSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: ".customize-swiper-next",
                prevEl: ".customize-swiper-prev",
            },
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                },
                1280: {
                    slidesPerView: 2
                },
                1440: {
                    slidesPerView: 2
                },
                1600: {
                    slidesPerView: 3
                },
            },
        });
    });
</script>
