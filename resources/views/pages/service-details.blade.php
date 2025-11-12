@extends('layouts.app')

@section('content')
<div class="bg-[#f2f2f2]">
    <x-banner page='Service Details' extension1=">" extension2=">" breadcrumb1='Services' breadcrumb2="{{ $service->title }}"
        img='images/services-banner.png' />

    <div class="container h-full py-20 mx-auto">
        <div class="grid grid-cols-3 gap-16 poppins-regular">
            <!-- 🟠 Left Content -->
            <div class="flex flex-col col-span-2 gap-6">
                <!-- Thumbnail -->
                @if ($service->thumbnail)
                <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->title }}"
                    class="rounded-lg shadow-md">
                @endif

                <!-- Title + Icon -->
                <div class="flex items-center gap-3">
                    @if ($service->icon)
                    <img src="{{ asset($service->icon) }}" alt="Icon" class="w-10 h-auto">
                    @endif
                    <div class="text-4xl text-black magistral-medium">
                        {{ $service->title }}
                    </div>
                </div>

                <!-- Short Description -->
                <div class="text-lg leading-relaxed">
                    {{ $service->short_description }}
                </div>

                <!-- Overview -->
                <div class="flex flex-col gap-3">
                    <div class="uppercase magistral text-[#f37021] text-base">Overview</div>
                    <div class="text-lg leading-relaxed">
                        {!! $service->overview !!}
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="uppercase magistral text-[#f37021] text-base">
                        What We Offer
                    </div>
                    @if (Str::contains($service->offer ?? '', '<li>'))
                        <ul class="pl-5 space-y-2 text-lg leading-relaxed list-disc">
                            {!! str_replace(['<ul>', '</ul>'], '', $service->offer) !!}
                        </ul>
                        @else
                        <ul class="pl-5 space-y-2 text-lg leading-relaxed list-disc">
                            @foreach (explode(',', $service->offer ?? '') as $item)
                            @if (trim($item))
                            <li>{{ trim($item) }}</li>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                </div>



                <!-- Service Gallery -->
                @if ($service->images->count() > 0)
                <div class="flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="uppercase magistral text-[#f37021] text-base">Service Gallery</div>
                        <div class="flex items-center justify-between h-full gap-3 mx-5">
                            <div
                                class="service-gallery-button-prev rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5m0 0l5 5" />
                                </svg>
                            </div>
                            <div
                                class="service-gallery-button-next rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white transition duration-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Swiper Container -->
                    <div class="w-full swiper myGallerySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($service->images as $img)
                            <div class="swiper-slide">
                                <img src="{{ asset($img->image) }}" alt=""
                                    class="object-cover w-full h-[20rem] transition duration-300 shadow-md rounded-md" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- 🟠 Right Sidebar -->
            <div class="flex flex-col gap-10">
                <!-- Other Services -->
                <div class="flex flex-col gap-5 py-10 bg-white shadow-xl px-7 h-fit">
                    <div class="text-lg font-bold text-black poppins-regular">
                        Other Services
                    </div>
                    <div class="flex flex-col gap-2">
                        @foreach ($relatedServices as $item)
                        <a href="{{ route('services.details', ['id' => $item->id]) }}"
                            class="flex justify-between px-5 py-3 transition duration-300 hover:bg-[#f8f8f8] group">
                            <div class="flex items-center gap-3">
                                @if ($item->icon)
                                <img src="{{ asset($item->icon) }}" alt="" class="h-auto w-7">
                                @endif
                                <div
                                    class="text-black magistral-medium group-hover:text-[#f37021] transition duration-300">
                                    {{ $item->title }}
                                </div>
                            </div>
                            <div class="text-lg text-gray-400 group-hover:text-[#f37021] transition duration-300">
                                >
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="h-[22rem]">
                    <div class="relative z-10 h-full overflow-hidden">
                        <div class="absolute z-20">
                            <div class="flex flex-col gap-5 px-7 py-9 bg-[#f37021] h-full">
                                <div class="relative z-20 text-lg font-bold text-black poppins-regular">
                                    Get In Touch
                                </div>
                                <div class="relative z-20 text-4xl leading-relaxed text-white magistral">
                                    Reach Out for the Service That Fits You
                                </div>
                                <div class="pt-8">
                                    <x-button border='border-black' link="contact-us" text="Contact Us"
                                        textcolor="white" />
                                </div>
                                <img src="{{ asset('images/footer-absolute.png') }}" alt=""
                                    class="absolute bottom-0 right-0 z-10 mix-blend-multiply opacity-20">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Brochure -->
                <div class="flex flex-col gap-5 bg-white shadow-xl p-7 poppins-regular">
                    <div class="text-lg font-bold text-black">
                        Company Brochure
                    </div>

                    <a href="{{ asset('pdf/Silid-Cuadrado-Profile.pdf') }}" download class="flex justify-between items-center p-4 bg-[#f37021] cursor-pointer hover:bg-[#e3611d] transition">
                        <div class="flex flex-col gap-2">
                            <div class="text-lg font-bold text-white">Download</div>
                            <div class="text-lg font-light text-white">Silid Cuadrado Profile.pdf</div>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="bg-white size-12 p-2 rounded-full text-[#f37021]">
                                <path fill="currentColor"
                                    d="M12 11a1 1 0 0 1 1 1v6.584l1.293-1.292a1 1 0 0 1 1.414 1.416l-2.824 2.819c-.253.252-.5.473-.883.473c-.336 0-.566-.169-.788-.38l-2.919-2.912a1 1 0 0 1 1.414-1.416L11 18.584V12a1 1 0 0 1 1-1m-.5-9c2.784 0 5.16 1.75 6.086 4.212a6.003 6.003 0 0 1 .395 11.453a3 3 0 0 0-.858-1.785a3 3 0 0 0-1.914-.873L15 15v-3a3 3 0 0 0-5.995-.176L9 12v3a3 3 0 0 0-2.123.88a3 3 0 0 0-.875 2.02A5.002 5.002 0 0 1 5 8.416A6.5 6.5 0 0 1 11.5 2" />
                            </svg>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    li {
        margin-left: 35px;
    }
</style>

<script>
    const gallerySwiper = new Swiper(".myGallerySwiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".service-gallery-button-next",
            prevEl: ".service-gallery-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 15
            },
        },
    });
</script>
@endsection