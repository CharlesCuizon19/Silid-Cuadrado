@extends('layouts.app')


@section('content')
    <div class="bg-[#f2f2f2]">
        <x-banner page='Project Details' extension1=">" extension2=">" breadcrumb1='Projects'
            breadcrumb2="{!! $project->name !!}" img='images/project-banner.png' />

        <div class="container h-full py-20 mx-auto">
            <div class="grid grid-cols-3 gap-16 poppins-regular">
                <div class="flex flex-col col-span-2 gap-6">
                    <div class="flex flex-col">
                        <img src="{{ asset($project->img) }}" alt="">
                        <div>

                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="text-lg text-[#f37021] font-bold">
                            {{ $project->category }}
                        </div>

                        <div class="text-5xl text-black magistral-medium">
                            {{ $project->name }}
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="uppercase magistral text-[#f37021] text-base">
                            overview
                        </div>
                        <div class="text-lg leading-relaxed">
                            {{ $project->overview }}
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="uppercase magistral text-[#f37021] text-base">
                            Scope of Work
                        </div>
                        <div class="space-y-3 text-lg">
                            @foreach ($project->scope_of_work as $item)
                                <li>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex flex-col gap-5">
                        <!-- Header with name and navigation -->
                        <div class="flex items-center justify-between">
                            <div class="uppercase magistral text-[#f37021] text-base">
                                Project Gallery
                            </div>
                            <div class="flex items-center justify-between h-full gap-3 mx-5">
                                {{-- Navigation --}}
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
                                @foreach ($project->gallery as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($item) }}" alt=""
                                            class="object-cover w-full h-[20rem] transition duration-300 shadow-md" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-5 py-10 bg-white shadow-xl px-7 h-fit">
                        <div class="text-lg font-bold text-black poppins-regular">
                            Other Projects
                        </div>
                        <div class="flex flex-col gap-2">
                            @foreach ($relatedProjects as $item)
                                <a href="{{ route('projects.details', ['id' => $item->id]) }}"
                                    class="flex justify-between px-5 py-3 transition duration-300 hover:bg-[#f8f8f8] group">
                                    <div class="flex items-center gap-3 ">
                                        <div class="w-[70px] h-full overflow-hidden">
                                            <img src="{{ asset($item->img) }}" alt=""
                                                class="object-cover w-auto h-full">
                                        </div>
                                        <div
                                            class="text-black flex flex-col magistral-medium group-hover:text-[#f37021] transition duration-300">
                                            <span class="text-[#f37021] text-sm poppins-regular font-bold">
                                                {!! $item->category !!}
                                            </span>
                                            <span class="line-clamp-2">
                                                {!! $item->name !!}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-lg text-gray-400 group-hover:text-[#f37021] transition duration-300">
                                        >
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="h-[22rem]">
                        <div class="relative z-10 h-full overflow-hidden">
                            <div class="absolute z-20">
                                <div class="flex flex-col gap-5 px-7 py-9 bg-[#f37021] h-full">
                                    <div class="relative z-20 text-lg font-bold text-black poppins-regular">
                                        Get In Touch
                                    </div>
                                    <div class="relative z-20 text-4xl leading-relaxed text-white magistral">
                                        Connect With Us for Your Next Project
                                    </div>
                                    <div class="pt-8 ">
                                        <x-button border='border-black' link="homepage" text="Contact Us"
                                            textcolor="white" />
                                    </div>
                                    <img src="{{ asset('images/footer-absolute.png') }}" alt=""
                                        class="absolute bottom-0 right-0 z-10 mix-blend-multiply opacity-20">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 bg-white shadow-xl p-7 poppins-regular">
                        <div class="text-lg font-bold text-black">
                            Company Brochure
                        </div>
                        <div class="flex justify-between items-center p-4 bg-[#f37021] cursor-pointer">
                            <div class="flex flex-col gap-2">
                                <div class="text-lg font-bold text-white">
                                    Download
                                </div>
                                <div class="text-lg font-light text-white">
                                    Silid Cuadrado Profile.pdf
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="bg-white size-12 p-2  rounded-full text-[#f37021]">
                                    <g fill="none">
                                        <path
                                            d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M12 11a1 1 0 0 1 1 1v6.584l1.293-1.292a1 1 0 0 1 1.414 1.416l-2.824 2.819c-.253.252-.5.473-.883.473c-.336 0-.566-.169-.788-.38l-2.919-2.912a1 1 0 0 1 1.414-1.416L11 18.584V12a1 1 0 0 1 1-1m-.5-9c2.784 0 5.16 1.75 6.086 4.212a6.003 6.003 0 0 1 .395 11.453a3 3 0 0 0-.858-1.785a3 3 0 0 0-1.914-.873L15 15v-3a3 3 0 0 0-5.995-.176L9 12v3a3 3 0 0 0-2.123.88a3 3 0 0 0-.875 2.02A5.002 5.002 0 0 1 5 8.416A6.5 6.5 0 0 1 11.5 2" />
                                    </g>
                                </svg>
                            </div>
                        </div>
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
