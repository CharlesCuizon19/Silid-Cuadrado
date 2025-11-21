@extends('layouts.app')

@section('content')
    <div class="bg-[#f2f2f2]">
        <x-banner page="Project Details" extension1=">" extension2=">" breadcrumb1="Projects"
            breadcrumb2="{!! $project->project_title !!}" img="images/project-banner.png" />

        <div class="container h-full py-20 mx-auto">
            <div class="grid grid-cols-3 gap-10 mx-3 xl:gap-16 poppins-regular">
                <div class="flex flex-col col-span-3 gap-6 lg:col-span-2">
                    <!-- Project Main Image -->
                    <div class="flex flex-col">
                        <img src="{{ asset($project->project_image) }}" alt="">
                    </div>

                    <!-- Category and Name -->
                    <div class="flex flex-col gap-3">
                        <div class="text-lg text-[#f37021] font-bold">
                            {{ $project->category->category_name ?? 'Uncategorized' }}
                        </div>
                        <div class="text-5xl text-black magistral-medium">
                            {!! $project->project_title !!}
                        </div>
                    </div>

                    <!-- Overview -->
                    <div class="flex flex-col gap-3">
                        <div class="uppercase magistral text-[#f37021] text-base">
                            Overview
                        </div>
                        <div class="text-lg leading-relaxed">
                            {!! $project->overview !!}
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 ck-content">
                        <div class="uppercase magistral text-[#f37021] text-base">
                            Scope of Work
                        </div>

                        <ul class="pl-5 space-y-2 text-lg leading-relaxed list-disc">
                            {!! $project->scope_work !!}
                        </ul>

                        {{-- @php
                            $scopeOfWorkContent = is_array($scopeOfWork) ? implode('', $scopeOfWork) : $scopeOfWork;
                        @endphp

                        @if (is_string($scopeOfWorkContent) && Str::contains($scopeOfWorkContent, '<li>'))
                            <ul class="pl-5 space-y-2 text-lg leading-relaxed list-disc">
                                {!! str_replace(['<ul>', '</ul>'], '', $scopeOfWorkContent) !!}
                            </ul>
                        @else
                            <ul class="pl-5 space-y-2 text-lg leading-relaxed list-disc">
                                @foreach ((array) $scopeOfWork as $item)
                                    @if (trim($item))
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif --}}
                    </div>


                    <!-- Gallery -->
                    <div class="flex flex-col gap-5">
                        <div class="flex items-center justify-between">
                            <div class="uppercase magistral text-[#f37021] text-base">
                                Project Gallery
                            </div>
                            <div class="flex items-center justify-between h-full gap-3 mx-5">
                                <div
                                    class="service-gallery-button-prev rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5m0 0l5 5" />
                                    </svg>
                                </div>
                                <div
                                    class="service-gallery-button-next rounded-full bg-[#515151] hover:bg-[#f37021] p-2 text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-full swiper myGallerySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($project->images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($img->images) }}" alt=""
                                            class="object-cover w-full h-[20rem] transition duration-300 shadow-md" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="flex flex-col col-span-3 gap-10 lg:col-span-1">
                    <div class="flex flex-col gap-5 px-3 py-10 bg-white shadow-xl xl:px-7 h-fit">
                        <div class="text-lg font-bold text-black poppins-regular">
                            Other Projects
                        </div>
                        <div class="flex flex-col gap-2">
                            @foreach ($relatedProjects as $item)
                                <a href="{{ route('projects.details', $item->id) }}"
                                    class="flex justify-between items-center px-3 xl:px-5 py-3 transition duration-300 hover:bg-[#f8f8f8] group">
                                    <div class="flex items-center gap-3 ">
                                        <div class="w-[70px] h-full overflow-hidden">
                                            <img src="{{ asset($item->project_image) }}" alt=""
                                                class="object-cover w-auto h-full">
                                        </div>
                                        <div
                                            class="text-black flex flex-col magistral-medium group-hover:text-[#f37021] transition duration-300">
                                            <span class="text-[#f37021] text-sm poppins-regular font-bold">
                                                {{ $item->category->category_name ?? '' }}
                                            </span>
                                            <span class="line-clamp-2">
                                                {{ $item->project_title }}
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

                    {{-- Contact Section --}}
                    <div class="h-[22rem]">
                        <div class="relative z-10 h-full overflow-hidden">
                            <div class="absolute z-20">
                                <div class="flex flex-col gap-5 px-7 py-9 bg-[#f37021] h-full">
                                    <div class="relative z-20 text-lg font-bold text-black poppins-regular">
                                        Get In Touch
                                    </div>
                                    <div class="relative z-20 text-xl leading-relaxed text-white xl:text-4xl magistral">
                                        Connect With Us for Your Next Project
                                    </div>
                                    <div class="pt-8">
                                        <x-button border="border-black" link="contact-us" text="Contact Us"
                                            textcolor="white" />
                                    </div>
                                    <img src="{{ asset('images/footer-absolute.png') }}" alt=""
                                        class="absolute bottom-0 right-0 z-10 mix-blend-multiply opacity-20">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Brochure --}}
                    <div class="flex flex-col gap-5 bg-white shadow-xl p-7 poppins-regular">
                        <div class="text-lg font-bold text-black">
                            Company Brochure
                        </div>
                        <a href="{{ asset('pdf/Silid-Cuadrado-Profile.pdf') }}" download
                            class="flex justify-between items-center p-4 bg-[#f37021] cursor-pointer hover:bg-[#e3611d] transition">
                            <div class="flex flex-col gap-2">
                                <div class="text-lg font-bold text-white">Download</div>
                                <div class="text-sm font-light text-white xl:text-lg">Silid Cuadrado Profile.pdf</div>
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

        .ck-content ul {
            list-style-type: disc !important;
        }

        /* Optional: add some spacing between list items */
        .ck-content ul li {
            margin-bottom: 0.4rem;
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
        });
    </script>
@endsection
