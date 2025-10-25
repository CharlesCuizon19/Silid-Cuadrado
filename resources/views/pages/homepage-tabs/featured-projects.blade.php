@php
    $projects = [
        (object) [
            'category' => 'STEEL & METAL FABRICATION',
            'name' => 'Stainless Steel Enclosure Fabrication',
            'img' => 'images/project1.png',
        ],
        (object) [
            'category' => 'STEEL & METAL FABRICATION',
            'name' => 'Structural Steel Beams & Columns',
            'img' => 'images/project2.png',
        ],
        (object) [
            'category' => 'STEEL & METAL FABRICATION',
            'name' => 'Steel Gates & Fencing Systems',
            'img' => 'images/project3.png',
        ],
        (object) [
            'category' => 'STEEL & METAL FABRICATION',
            'name' => 'Custom Metal Canopy & Frame Works',
            'img' => 'images/project4.png',
        ],
    ];
@endphp

<div class="relative">
    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="grid grid-cols-2 gap-7">
                <div class="flex flex-col gap-5">
                    <div class="text-lg font-bold uppercase poppins-regular">
                        featured projects
                    </div>
                    <div class="text-5xl text-[#f37021] magistral leading-tight">
                        Showcasing Strength and Design in Every Build
                    </div>
                </div>
                <div class="flex flex-col justify-between">
                    <div class="text-xl poppins-regular">
                        From large-scale steel fabrication works to customized interior fit-outs, each project reflects
                        our
                        commitment to durability, functionality, and style.
                    </div>
                    <x-button border='border-black' link="homepage" text="All Projects" textcolor="white"
                        bgcolor="[#f37021]" bghovercolor="[#a63e00]" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 py-24">
                @foreach ($projects as $item)
                    <div class=" w-full h-[410px] group overflow-hidden cursor-pointer">
                        <div class="relative">
                            <img src="{{ asset($item->img) }}" alt=""
                                class="object-cover w-full h-auto transition duration-300 group-hover:scale-105">
                            <div class="absolute inset-0">
                                <div
                                    class="w-full h-full transition-all duration-300 opacity-0 bg-gradient-to-t from-black to-transparent group-hover:opacity-100">

                                </div>
                            </div>
                            <div
                                class="absolute transition duration-500 -translate-x-32 opacity-0 group-hover:opacity-100 group-hover:-translate-x-0 bottom-10 left-10">
                                <div class="flex flex-col gap-3">
                                    <div class="text-lg font-bold poppins-refular text-[#f37021]">
                                        {{ $item->category }}
                                    </div>
                                    <div class="text-2xl text-white poppins-refular magistral">
                                        {{ $item->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <img src="{{ asset('images/absolute-box.png') }}" alt="" class="absolute top-[22rem] -left-[7rem]">
</div>
