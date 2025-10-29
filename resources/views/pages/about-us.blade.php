@extends('layouts.app')

@section('content')
    <div class="bg-[#f8f8f8]">
        <x-banner page='About Us' extension1=">" breadcrumb1='About Us' img='images/aboutus-banner.png' />

        <div class="h-full py-20">
            <div class="mr-[13rem] ">
                <div class="grid items-center grid-cols-1 gap-20 2xl:grid-cols-5">
                    <div class="2xl:col-span-3" data-aos="fade-right">
                        <div class="relative">
                            <img src="{{ asset('images/aboutus-img2.png') }}" alt="" class="w-full h-auto">

                            <div
                                class="absolute top-0 2xl:top-[10rem] text-xl 2xl:text-6xl uppercase -rotate-90 -right-[5rem] text-[#E0E0E0]/60 magistral">
                                experts
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 2xl:col-span-2" data-aos="fade-left">
                        <div class="font-bold text-black uppercase poppins-regular">
                            who we are
                        </div>
                        <div class="text-5xl text-[#f37021] magistral leading-tight">
                            Forging Strength and Innovation in Every Build
                        </div>
                        <div class="text-lg leading-loose text-black poppins-regular">
                            <span class="font-bold">
                                SILID CUADRADO ENGINEERING SERVICES
                            </span>
                            is a trusted engineering and construction partner specializing in steel and metal fabrication,
                            HVAC and airconditioning systems, electrical works, and interior fit-out projects.
                        </div>
                        <div
                            class="border-l-4 border-[#f37021] bg-gradient-to-r from-[#f37021]/60 to-transparent p-5 leading-loose poppins-regular text-lg">
                            Founded with a vision to deliver quality and precision, we take pride in providing clients with
                            durable, efficient, and custom-engineered solutions that meet the demands of modern
                            construction.
                        </div>
                        <div class="relative z-10">
                            <div class="flex ml-10 mt-5 gap-3 flex-col magistral text-[#f37021]">
                                <div class="count-up text-8xl" data-target="5">
                                    <span class="count-value">0</span><span class="">+</span>
                                </div>
                                <div class="text-4xl">
                                    Years of Experience
                                </div>
                            </div>
                            <div class="absolute top-0 left-0 -z-10 h-[150px] w-[105px] bg-[#eaeaea]/60">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-full my-14">
            <div class="relative bg-[#f37021]">
                <img src="{{ asset('images/aboutus-rectangle.png') }}" alt=""
                    class="object-cover w-full h-auto mix-blend-multiply">

                <div class="absolute inset-0">
                    <div class="container flex items-center justify-center h-full mx-auto">
                        <div class="grid justify-between w-full grid-cols-3 text-center divide-x-[1px] divide-black">
                            <div class="flex flex-col gap-3 magistral" data-aos="zoom-in">
                                <div class="text-white text-7xl count-up" data-target="300">
                                    <span class="count-value">0</span><span class="count-suffix">+</span>
                                </div>
                                <div class="text-4xl text-white">
                                    Projects Completed
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 magistral" data-aos="zoom-in">
                                <div class="text-white text-7xl count-up" data-target="100">
                                    <span class="count-value">0</span><span class="count-suffix">+</span>
                                </div>
                                <div class="text-4xl text-white">
                                    Satisfied Clients
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 magistral" data-aos="zoom-in">
                                <div class="text-white text-7xl count-up" data-target="10000">
                                    <span class="count-value">0</span><span class="count-suffix">+</span>
                                </div>
                                <div class="text-4xl text-white">
                                    Sqm Built Spaces
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-full py-16">
            <div class="container mx-auto">
                <div class="grid grid-cols-2 gap-10">
                    <div class="flex flex-col gap-5" data-aos="fade-right">
                        <div class="text-lg font-bold uppercase poppins-regular">
                            mission & vision
                        </div>
                        <div class="magistral text-5xl leading-tight text-[#f37021] w-[80%] mb-5">
                            Crafting Excellence and Growth
                        </div>
                        <div>
                            <img src="{{ asset('images/aboutus-img3.png') }}" alt="" class="w-full h-full">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5">
                        <div class="flex gap-5 p-5 border rounded-lg" data-aos="zoom-in">
                            <div>
                                <img src="{{ asset('images/mission.png') }}" alt="" class="h-12 w-52">
                            </div>
                            <div class="flex flex-col gap-5">
                                <div class="uppercase text-2xl text-[#383838] magistral">
                                    our mission
                                </div>
                                <div class="text-lg leading-loose poppins-regular">
                                    To deliver high-quality, custom-fabricated steel and metal solutions for panel boards
                                    and cable trays, exceeding client expectations and enhancing the efficiency of
                                    electrical and mechanical projects. We prioritize precision, safety, and sustainability,
                                    ensuring our products meet the highest industry standards.
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-5 p-5 border rounded-lg" data-aos="zoom-in">
                            <div>
                                <img src="{{ asset('images/vision.png') }}" alt="" class="h-12 w-52">
                            </div>
                            <div class="flex flex-col gap-5">
                                <div class="uppercase text-2xl text-[#383838] magistral">
                                    our vision
                                </div>
                                <div class="text-lg leading-loose poppins-regular">
                                    To deliver high-quality, custom-fabricated steel and metal solutions for panel boards
                                    and cable trays, exceeding client expectations and enhancing the efficiency of
                                    electrical and mechanical projects. We prioritize precision, safety, and sustainability,
                                    ensuring our products meet the highest industry standards.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h-full bg-[#f1f1f1] relative">
            <img src="{{ asset('images/aboutus-img4.png') }}" alt="" class="w-full h-full mix-blend-multiply">

            <div class="absolute inset-0">
                <div class="container h-full mx-auto text-center">
                    <div class="flex flex-col items-center justify-center h-full gap-24">
                        <div class="flex flex-col items-center justify-center gap-5 text-center" data-aos="zoom-in">
                            <div class="text-lg font-bold uppercase poppins-regular">
                                core values
                            </div>
                            <div class="text-[#f37021] text-6xl magistral w-[60%]">
                                Driven by Quality and Progress
                            </div>
                            <div class="text-xl poppins-regular">
                                Delivering products that meet the highest industry standards.
                            </div>
                        </div>

                        <div class="grid w-full grid-cols-4">
                            <div class="flex justify-center" data-aos="zoom-in">
                                <img src="{{ asset('images/corevalue1.png') }}" alt="">
                            </div>
                            <div class="flex justify-center" data-aos="zoom-in">
                                <img src="{{ asset('images/corevalue2.png') }}" alt="">
                            </div>
                            <div class="flex justify-center" data-aos="zoom-in">
                                <img src="{{ asset('images/corevalue3.png') }}" alt="">
                            </div>
                            <div class="flex justify-center" data-aos="zoom-in">
                                <img src="{{ asset('images/corevalue4.png') }}" alt="">
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-14">
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                                <div class=" bg-[#A6A6A6] p-3">
                                </div>
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-14">
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                                <div class=" bg-[#A6A6A6] p-3">
                                </div>
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-14">
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                                <div class=" bg-[#A6A6A6] p-3">
                                </div>
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-14">
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                                <div class=" bg-[#A6A6A6] p-3">
                                </div>
                                <div class=" border border-[#DADADA] w-[12rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex justify-center mt-14">
                                <div class="rotate-90 border border-[#DADADA] w-[7rem]">

                                </div>
                            </div>
                            <div class="flex flex-col gap-3 p-5 mx-3 bg-[#f8f8f8] rounded-md mt-14" data-aos="zoom-in">
                                <div class="magistral text-2xl text-[#f37021]">
                                    Innovation
                                </div>
                                <div class="text-lg leading-loose poppins-regular">
                                    Embracing new technologies and methods to improve efficiency and performance.
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 p-5 mx-3 bg-[#f8f8f8] rounded-md mt-14" data-aos="zoom-in">
                                <div class="magistral text-2xl text-[#f37021]">
                                    Customer-centricity
                                </div>
                                <div class="text-lg leading-loose poppins-regular">
                                    Understanding and meeting client needs and expectations.
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 p-5 mx-3 bg-[#f8f8f8] rounded-md mt-14" data-aos="zoom-in">
                                <div class="magistral text-2xl text-[#f37021]">
                                    Safety
                                </div>
                                <div class="text-lg leading-loose poppins-regular">
                                    Prioritizing the well-being of employees, clients, and end-users.
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 p-5 mx-3 bg-[#f8f8f8] rounded-md mt-14" data-aos="zoom-in">
                                <div class="magistral text-2xl text-[#f37021]">
                                    Sustainability
                                </div>
                                <div class="text-lg leading-loose poppins-regular">
                                    Minimizing environmental impact through responsible practices.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
