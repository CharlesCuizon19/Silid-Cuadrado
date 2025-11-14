<div class="relative mx-3 lg:mx-3 xl:mx-3 2xl:mx-0">
    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                <div class="flex flex-col gap-5" data-aos="zoom-in">
                    <div class="text-xs font-bold uppercase lg:text-lg poppins-regular">
                        featured projects
                    </div>
                    <div class="text-2xl lg:text-5xl text-[#f37021] magistral leading-tight">
                        Showcasing Strength and Design in Every Build
                    </div>
                </div>
                <div class="flex flex-col gap-5 lg:justify-between lg:gap-5 2xl:gap-0" data-aos="zoom-in">
                    <div class="text-sm lg:text-xl poppins-regular">
                        From large-scale steel fabrication works to customized interior fit-outs, each project reflects
                        our commitment to durability, functionality, and style.
                    </div>
                    <div class="mx-3">
                        <x-button border='border-black' link="projects.show" text="All Projects" textcolor="white"
                            bgcolor="[#f37021]" bghovercolor="[#a63e00]" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 pt-10 pb-24 lg:pt-24 lg:grid-cols-2" data-aos="zoom-in">
                @foreach ($projects as $item)
                    <a href="{{ route('projects.details', ['id' => $item->id]) }}"
                        class="w-full h-full lg:h-[410px] group overflow-hidden cursor-pointer">
                        <div class="relative w-full h-full">
                            <img src="{{ asset($item->project_image ?? 'images/no-image.png') }}"
                                alt="{{ $item->project_title }}"
                                class="object-cover w-full h-full transition duration-300 group-hover:scale-105">

                            <div class="absolute inset-0">
                                <div
                                    class="w-full h-full transition-all duration-300 opacity-0 bg-gradient-to-t from-black to-transparent group-hover:opacity-100">
                                </div>
                            </div>

                            <div
                                class="absolute transition duration-500 -translate-x-32 opacity-0 group-hover:opacity-100 group-hover:-translate-x-0 bottom-10 left-10">
                                <div class="flex flex-col gap-3">
                                    <div class="text-lg font-bold poppins-regular text-[#f37021]">
                                        {{ $item->category->category_name ?? 'Uncategorized' }}
                                    </div>
                                    <div class="text-2xl text-white poppins-regular magistral">
                                        {{ $item->project_title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <img src="{{ asset('images/absolute-box.png') }}" alt=""
        class="absolute top-[22rem] -left-[7rem] hidden 2xl:flex" data-aos="zoom-in">
</div>
