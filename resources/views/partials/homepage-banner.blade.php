<div class="relative swiper banner-swiper mt-[103px] lg:mt-0 lg:h-[65rem] lg:w-full h-[20rem]">
    <div class="swiper-wrapper">
        @foreach ($banners as $item)
            @php
                $words = explode(' ', $item->title ?? '');
                $firstWord = array_shift($words);
                $remaining = implode(' ', $words);
            @endphp

            <div class="relative swiper-slide">
                <!-- ✅ Dynamic banner image -->
                <img src="{{ asset($item->image ?? 'images/banner.png') }}" alt="{{ $item->title }}"
                    class="object-cover w-full h-full">

                <div class="absolute inset-0 z-10">
                    <img src="{{ asset('images/banner-sheet.png') }}" alt="Banner Overlay"
                        class="object-cover w-full h-full">
                </div>

                <div class="absolute inset-0 z-20 w-full h-full mx-3 text-white lg:mx-3 2xl:mx-0">
                    <div class="container flex flex-col justify-center w-full h-full gap-3 mx-auto lg:gap-5">
                        <div class="text-xs lg:text-base font-bold poppins-regular text-[#f37021]" data-aos="zoom-in">
                            CUSTOM-ENGINEERED RESULTS
                        </div>

                        <div class="text-2xl lg:text-8xl magistral leading-[1.1] font-bold">
                            <div class="flex items-end gap-3 lg:gap-5">
                                <div data-aos="zoom-in">{{ $firstWord }}</div>
                                <div class="flex items-end" data-aos="zoom-in">
                                    <div
                                        class="flex bg-gradient-to-r from-[#f37021] to-transparent w-24 lg:w-64 h-[16px] lg:h-[60px] mb-1 lg:mb-2">
                                    </div>
                                </div>
                            </div>
                            <div class="w-[80%] lg:w-[50%]" data-aos="zoom-in">{{ $remaining }}</div>
                        </div>

                        <div class="text-sm lg:text-2xl font-light poppins-regular lg:w-[50%] lg:leading-[50px]"
                            data-aos="zoom-in">
                            {!! $item->subtitle !!}
                        </div>

                        <div data-aos="zoom-in">
                            <x-button border='border-white' link="services.show" text="Explore Services"
                                textcolor="white" bgcolor="[#f37021]" bghovercolor="bg-[#a63e00]" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Decorative borders & pagination -->
    <div class="absolute top-[14rem] right-[218px] z-20 h-64 border-l border-white/50 hidden lg:flex"></div>
    <div class="absolute z-10 pr-[13rem] swiper-pagination hidden lg:flex"></div>
    <div class="absolute bottom-[14rem] right-[218px] z-20 h-64 border-l border-white/50 hidden lg:flex"></div>
</div>

<style>
    .banner-swiper .swiper-pagination {
        height: fit-content;
        right: 100%;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 20px;
    }

    @media (max-width: 767px) {
        .banner-swiper .swiper-pagination {
            display: none;
        }
    }

    .banner-swiper .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        border: 1px solid white;
        background: transparent;
        opacity: 1;
        transition: all 0.3s ease;
        border-radius: 50%;
    }

    .banner-swiper .swiper-pagination-bullet-active {
        transform: scale(1);
        background: #f37021;
        border-color: #f37021;
    }
</style>

<script>
    const swiper = new Swiper('.banner-swiper', {
        loop: true,
        speed: 1000,
        effect: 'slide',
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
