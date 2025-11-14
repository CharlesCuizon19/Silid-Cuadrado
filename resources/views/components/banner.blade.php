@props([
    'page' => 'Page',
    'breadcrumb1' => '',
    'breadcrumb2' => '',
    'extension1' => '',
    'extension2' => '',
    'img' => '',
])

<div>
    <div class="relative mt-[104px] lg:mt-0">
        <img src="{{ asset($img) }}" alt="" class="w-full h-auto">

        <div class="absolute inset-0 top-0 z-20 text-4xl text-white lg:text-7xl lg:top-32 magistral">
            <div class="flex items-center justify-center w-full h-full">
                <div data-aos="zoom-in">
                    {{ $page }}
                </div>
            </div>
        </div>
        <div class="absolute inset-0 z-20 text-base font-semibold text-white/60 bottom-2 lg:bottom-5 poppins-regular">
            <div class="flex items-end justify-center w-full h-full">
                <div class="flex gap-3 text-sm lg:text-base" data-aos="zoom-in">
                    Home
                    <span>{{ $extension1 }}</span>
                    <span class="{{ !$breadcrumb2 ? 'text-[#f37021]' : '' }}">{{ $breadcrumb1 }}</span>
                    <span>{{ $extension2 }}</span>
                    <span class="{{ $breadcrumb1 ? 'text-[#f37021]' : '' }}">{{ $breadcrumb2 }}</span>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 z-10">
            <div class="bg-gradient-to-t from-[#464646]/80 to-transparent w-full h-full">

            </div>
        </div>
        <div class="absolute inset-0 z-10 w-full h-full bg-gradient-to-t from-black/60 to-transparent">

        </div>
    </div>
</div>
