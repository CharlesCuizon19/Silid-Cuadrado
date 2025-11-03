<div class="py-10">
    <div class="container h-full mx-auto">
        <div class="relative grid grid-cols-4 gap-5 mx-3 2xl:mx-0">
            <div class="flex flex-col col-span-4 gap-8 2xl:col-span-3">
                <div class="flex items-center justify-between" data-aos="fade-right">
                    <div class="text-2xl text-black 2xl:text-5xl magistral">
                        We Offer
                    </div>
                    <div class="flex gap-3">
                        {{-- navigation --}}
                        <div
                            class="customize-swiper-prev rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5m0 0l5 5" />
                            </svg>
                        </div>
                        <div
                            class="customize-swiper-next rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="swiper myServicesSwiper max-w-[100%]" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        @foreach ($services as $item)
                            <a href="{{ route('services.details', ['id' => $item->id]) }}" class="swiper-slide">
                                <div class="flex flex-col justify-between h-full gap-5 cursor-pointer group">
                                    <img src="{{ asset($item->img) }}" alt=""
                                        class="w-20 h-auto 2xl:w-28 spin-y-hover">

                                    <div class="flex flex-col items-start justify-start gap-5">
                                        <div
                                            class="text-2xl font-bold magistral-medium group-hover:text-[#f37021] transition duration-300">
                                            {{ $item->title }}
                                        </div>
                                        <div class="poppins-regular text-black/70 line-clamp-2">
                                            {{ $item->description }}
                                        </div>
                                        <div
                                            class="flex group items-center gap-3 font-bold poppins-regular text-[#f37021] transition duration-300">
                                            <div>
                                                View Details
                                            </div>
                                            <div class="transition ease-in-out group-hover:translate-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="size-8">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="2xl:absolute z-30 -top-[11rem] right-0 col-span-4 2xl:col-span-1" data-aos="zoom-in">
                <div class="relative">
                    <img src="{{ asset('images/we-offer-img.png') }}" alt="" class="object-cover w-auto h-full">
                    <div class="absolute top-0 px-10 py-3 text-white">
                        <div class="flex flex-col gap-3">
                            <div class="magistral text-8xl text-shadow-soft">
                                5+
                            </div>
                            <div class="text-2xl magistral text-shadow-soft">
                                Years of Exprience
                            </div>
                            <a href="{{ route('services.show') }}"
                                class="flex items-center gap-3 transition duration-300 group hover:scale-105">
                                <div
                                    class="rounded-full bg-white group-hover:bg-[#5f544d] group-hover:text-white p-1 text-[#f37021] transition duration-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                    </svg>
                                </div>
                                <div class="font-semibold poppins-regular">
                                    All Services
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .spin-y-hover {
        transition: transform 0.8s ease;
        transform-style: preserve-3d;
    }

    .spin-y-hover:hover {
        transform: rotateY(360deg);
    }

    .text-shadow-soft {
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.25);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".myServicesSwiper", {
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
                    slidesPerView: 3
                },
            },
        });
    });
</script>
