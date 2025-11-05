@extends('layouts.app')


@section('content')
    <div class="bg-[#f2f2f2]">
        <x-banner page='Product Details' extension1=">" extension2=">" breadcrumb1='Products' breadcrumb2="{{ $product->name }}"
            img='images/products-banner.png' />

        <div class="container h-full py-20 mx-auto space-y-16">
            <div class="grid grid-cols-1 gap-10 2xl:grid-cols-2">
                <!-- Product Gallery -->
                <div class="w-full max-w-4xl mx-auto">
                    <!-- Main Swiper -->
                    <div class="relative mb-4 swiper mainSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $item)
                                <div class="swiper-slide">
                                    <img src="{{ asset($item->image) }}" class="w-full h-[400px] object-contain" />
                                </div>
                            @endforeach

                        </div>

                        <!-- Navigation buttons -->
                        <div class="absolute inset-0 z-10 flex items-center justify-between h-full gap-3 mx-5">
                            {{-- navigation --}}
                            <div
                                class="product-gallery-button-prev rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5m0 0l5 5" />
                                </svg>
                            </div>
                            <div
                                class="product-gallery-button-next rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail Swiper -->
                    <div class="swiper thumbSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $item)
                                <div class="cursor-pointer swiper-slide">
                                    <img src="{{ asset($item->image) }}" class="object-cover w-full h-24" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-5">
                    <div class="text-5xl magistral-medium">
                        {{ $product->title }}
                    </div>
                    <div class="text-xl poppins-regular">
                        {!! $product->description !!}
                    </div>

                    <div class="flex flex-col gap-2 mb-5">
                        <div class="text-sm text-gray-400 uppercase magistral-medium">Category</div>
                        <div class="text-[#f37021] font-bold text-lg poppins-regular uppercase">
                            {{ $product->category->category_name ?? 'Uncategorized' }}
                        </div>
                    </div>
                    <x-product-inquiry-modal :product="$product" />
                </div>
            </div>
            <div>
                <div x-data="{ tab: 'overview' }" class="w-full poppins-regular">
                    <!-- Tab Buttons -->
                    <div class="flex gap-6 border-b border-gray-200">
                        <button @click="tab = 'overview'"
                            :class="tab === 'overview' ? 'text-[#f37021] border-b-2 border-[#f37021]' : 'text-gray-400'"
                            class="pb-2 transition-colors duration-200">
                            Product Overview
                        </button>

                        <button @click="tab = 'info'"
                            :class="tab === 'info' ? 'text-[#f37021] border-b-2 border-[#f37021]' : 'text-gray-400'"
                            class="pb-2 transition-colors duration-200">
                            Additional Information
                        </button>
                    </div>

                    <!-- Tab Contents -->
                    <div class="mt-4 leading-relaxed">
                        <div x-show="tab === 'overview'" x-transition>
                            <p class="text-lg">
                                {!! $product->overview !!}
                            </p>
                        </div>

                        <div x-show="tab === 'info'" x-transition>
                            <p class="text-lg">
                                {!! $product->additional_information !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col poppins-regular">
                <div class="mb-3 text-lg font-bold">
                    Get in Touch:
                </div>
                <ul class="space-y-3 text-lg list-disc">
                    <li>
                        Telephone: (046) 435-2493
                    </li>
                    <li>
                        Globe: 0965-376-6333 /0927-321-2627 / 0927-779-8377
                    </li>
                    <li>
                        Smart: 0928-524-1929 / 0969-513-060310908-249-0803
                    </li>
                    <li>
                        Email: silidcuadrad0@gmail.com
                    </li>
                </ul>
                <div class="pb-5 mt-6 mb-5 text-2xl font-bold border-b">
                    INQUIRE NOW!!
                </div>
                <x-related-products :products="$products" />
            </div>
        </div>

    </div>

    <style>
        li {
            margin-left: 35px;
        }

        /* Orange border for active thumbnail */
        .thumbSwiper .swiper-slide-thumb-active {
            border: 3px solid #f37021 !important;
            padding: 2px;
        }

        /* Optional: Improve visual feedback on hover */
        .thumbSwiper .swiper-slide {
            transition: border 0.3s ease;
            border: 2px solid transparent;
        }

        .thumbSwiper .swiper-slide:hover {
            border: 2px solid #f37021;
        }
    </style>

    <script>
        const thumbSwiper = new Swiper(".thumbSwiper", {
            spaceBetween: 10,
            slidesPerView: 5,
            freeMode: true,
            watchSlidesProgress: true,
        });

        const mainSwiper = new Swiper(".mainSwiper", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".product-gallery-button-next",
                prevEl: ".product-gallery-button-prev",
            },
            thumbs: {
                swiper: thumbSwiper,
            },
        });
    </script>
@endsection
