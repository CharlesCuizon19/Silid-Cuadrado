@php
    $banners = [
        (object) [
            'title' => 'Precision in Every Structure',
            'slogan' => 'We deliver high-quality steel fabrication, interior fit-out, and engineering solutions built for
                        durability, performance, and design excellence.',
        ],
        (object) [
            'title' => 'Excellence in Every Project',
            'slogan' => 'From concept to completion, we bring vision to life through precision engineering and design.',
        ],
        (object) [
            'title' => 'Excellence in Every Project',
            'slogan' => 'From concept to completion, we bring vision to life through precision engineering and design.',
        ],
    ];
@endphp

<div class="relative swiper banner-swiper">
    <div class="swiper-wrapper">
        @foreach ($banners as $item)
            @php
                $words = explode(' ', $item->title);
                $firstWord = array_shift($words); // first word
                $remaining = implode(' ', $words); // the rest
            @endphp

            <div class="relative swiper-slide">
                <img src="{{ asset('images/banner.png') }}" alt="" class="object-cover w-full h-full">

                <div class="absolute inset-0 z-10">
                    <img src="{{ asset('images/banner-sheet.png') }}" alt=""
                        class="object-cover w-full max-h-full">
                </div>

                <div class="absolute inset-0 z-20 w-full h-full text-white">
                    <div class="container flex flex-col justify-center w-full h-full gap-5 mx-auto">
                        <div class="font-bold poppins-regular text-[#f37021]">
                            CUSTOM-ENGINEERED RESULTS
                        </div>

                        <div class="text-8xl magistral leading-[1.1] font-bold">
                            <div class="flex items-end gap-5">
                                <div>{{ $firstWord }}</div>
                                <div class="flex items-end">
                                    <div class="flex bg-gradient-to-r from-[#f37021] to-transparent w-64 h-[60px] mb-2">
                                    </div>
                                </div>
                            </div>
                            <div class="w-[50%]">{{ $remaining }}</div>
                        </div>

                        <div class="text-2xl font-light poppins-regular w-[50%] leading-[50px]">
                            {{ $item->slogan }}
                        </div>

                        <x-button text="Explore Services" color="white" link="homepage" padding="500px" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Decorative borders & pagination -->
    <div class="absolute top-[14rem] right-[218px] z-20 h-64 border-l border-white/50"></div>
    <div class="absolute z-10 pr-[13rem] swiper-pagination"></div>
    <div class="absolute bottom-[14rem] right-[218px] z-20 h-64 border-l border-white/50"></div>
</div>

<style>
    /* Vertical pagination on right side */
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
