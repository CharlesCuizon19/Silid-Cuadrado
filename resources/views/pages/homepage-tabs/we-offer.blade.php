@php
    $services = [
        (object) [
            'title' => 'Steel & Metail Fabrication',
            'description' => 'Custom steel structures and components engineered for strength and durability.',
            'img' => 'images/service-img1.png',
        ],
        (object) [
            'title' => 'Refrigeration & Airconditioning',
            'description' => 'Installation and maintenance of airconditioning and HVAC systems.',
            'img' => 'images/service-img2.png',
        ],
        (object) [
            'title' => 'Electrical Works',
            'description' => 'Installation of electrical systems designed for safe and reliable power distribution.',
            'img' => 'images/service-img3.png',
        ],
        (object) [
            'title' => 'Electrical Works',
            'description' => 'Installation of electrical systems designed for safe and reliable power distribution.',
            'img' => 'images/service-img3.png',
        ],
    ];
@endphp

<div class="py-10 bg-white">
    <div class="container h-full mx-auto">
        <div class="relative grid grid-cols-4 gap-5">
            <div class="flex flex-col col-span-3 gap-8">
                <div class="flex items-center justify-between">
                    <div class="text-5xl text-black magistral">
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
                <div class="swiper myServicesSwiper max-w-[100%]">
                    <div class="swiper-wrapper">
                        @foreach ($services as $item)
                            <div class="swiper-slide">
                                <div class="flex flex-col justify-between gap-5 cursor-pointer group">
                                    <img src="{{ asset($item->img) }}" alt="" class="h-auto w-28 spin-y-hover">

                                    <div class="flex flex-col items-start justify-start gap-5">
                                        <div
                                            class="text-2xl font-bold magistral-thin group-hover:text-[#f37021] transition duration-300">
                                            {{ $item->title }}
                                        </div>
                                        <div class="poppins-regular text-black/70 line-clamp-2">
                                            {{ $item->description }}
                                        </div>
                                        <button
                                            class="flex items-center gap-3 font-bold poppins-regular text-[#f37021] hover:scale-105 transition duration-300">
                                            <div>
                                                View Details
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="size-8">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="absolute z-30 -top-[11rem] right-0">
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
                            <button class="flex items-center gap-3 transition duration-300 group hover:scale-105">
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
                            </button>
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
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });
    });
</script>
