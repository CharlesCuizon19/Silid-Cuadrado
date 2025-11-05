<div class="py-16">
    <div class="container h-full mx-auto">
        <div class="relative grid grid-cols-4 gap-10 mx-3 2xl:mx-0">
            <!-- LEFT SECTION -->
            <div class="flex flex-col col-span-4 gap-10 2xl:col-span-3">
                <!-- Header -->
                <div class="flex items-center justify-between" data-aos="fade-right">
                    <h2 class="text-3xl text-black 2xl:text-5xl magistral">We Offer</h2>
                    <div class="flex gap-3">
                        <!-- Prev -->
                        <div
                            class="customize-swiper-prev rounded-full bg-[#515151] hover:bg-[#f37021] p-3 text-white transition duration-300 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5m0 0l5 5" />
                            </svg>
                        </div>
                        <!-- Next -->
                        <div
                            class="customize-swiper-next rounded-full bg-[#515151] hover:bg-[#f37021] p-3 text-white transition duration-300 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="w-full swiper myServicesSwiper" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        @foreach ($services as $item)
                            <a href="{{ route('services.details', ['id' => $item->id]) }}" class="block swiper-slide">
                                <div
                                    class="flex flex-col justify-between h-full gap-5 p-6 transition duration-300 bg-white border border-gray-200 shadow-sm rounded-2xl hover:shadow-md group">

                                    <!-- ICON or IMAGE -->
                                    @if (!empty($item->icon))
                                        <img src="{{ asset($item->icon) }}" alt="{{ $item->title }}"
                                            class="object-contain w-16 h-16 mx-auto 2xl:w-20 2xl:h-20 spin-y-hover">
                                    @else
                                        <img src="{{ asset($item->img) }}" alt="{{ $item->title }}"
                                            class="w-20 h-auto mx-auto 2xl:w-28 spin-y-hover">
                                    @endif

                                    <!-- Content -->
                                    <div
                                        class="flex flex-col items-start justify-start gap-3 text-center 2xl:text-left">
                                        <div
                                            class="text-2xl font-bold magistral-medium group-hover:text-[#f37021] transition duration-300">
                                            {{ $item->title }}
                                        </div>

                                        @if (!empty($item->short_description))
                                            <div class="text-base text-black/80 poppins-regular">
                                                {{ $item->short_description }}
                                            </div>
                                        @endif

                                        <div class="leading-relaxed poppins-regular text-black/70 line-clamp-2">
                                            {{ $item->description }}
                                        </div>

                                        <div
                                            class="flex items-center gap-2 font-semibold poppins-regular text-[#f37021] transition duration-300 group-hover:gap-3">
                                            <span>View Details</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                class="transition-transform duration-300 size-6 group-hover:translate-x-1">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT SECTION -->
            <div class="2xl:absolute z-30 -top-[11rem] right-0 col-span-4 2xl:col-span-1" data-aos="fade-left">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/we-offer-img.png') }}" alt="Experience Image"
                        class="object-cover w-full h-full">
                    <div class="absolute inset-0"></div>

                    <div class="absolute top-0 px-10 py-5 text-white">
                        <div class="flex flex-col gap-4">
                            <div class="leading-none magistral text-8xl text-shadow-soft">5+</div>
                            <div class="text-2xl magistral text-shadow-soft">Years of Experience</div>

                            <a href="{{ route('services.show') }}"
                                class="flex items-center gap-3 transition duration-300 group hover:scale-105">
                                <div
                                    class="rounded-full bg-white group-hover:bg-[#5f544d] group-hover:text-white p-2 text-[#f37021] transition duration-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="transition-transform size-5 group-hover:translate-x-1">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                    </svg>
                                </div>
                                <span class="font-semibold poppins-regular">All Services</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STYLES -->
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

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".myServicesSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
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
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            },
        });
    });
</script>
