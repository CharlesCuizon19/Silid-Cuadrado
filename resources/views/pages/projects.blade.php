@extends('layouts.app')

@section('content')
    <div class="bg-[#f2f2f2] min-h-screen">
        <x-banner page='Our Projects' extension1=">" breadcrumb1='Projects' img='images/project-banner.png' />

        <div class="pt-20 mx-3 pb-52">
            <div class="container mx-auto">
                <div class="flex flex-col gap-3 poppins-regular">
                    {{-- Info text --}}
                    <div class="text-xl font-medium" data-aos="zoom-in">
                        Showing {{ ($page - 1) * $perPage + 1 }}–
                        {{ min($page * $perPage, $total) }} of {{ $total }} results
                    </div>

                    {{-- Filter + Search (unchanged) --}}
                    <div class="relative z-30 flex items-center justify-between" data-aos="zoom-in">
                        <div class="flex gap-2">
                            <div x-data="multiSelect()" class="relative">
                                <button @click="toggleDropdown"
                                    class="flex items-center justify-between px-4 py-3 bg-white rounded-md shadow-sm w-60 hover:bg-gray-50">
                                    <div class="flex flex-wrap items-center gap-1 text-lg text-gray-800">
                                        <template x-if="selected.length === 0">
                                            <span>All Projects</span>
                                        </template>
                                        <template x-for="(item, index) in selected" :key="item">
                                            <div class="flex items-center gap-1 bg-gray-100 px-2 py-0.5 rounded">
                                                <span x-text="item"></span>
                                                <button @click.stop="remove(item)"
                                                    class="text-xs text-gray-500 hover:text-gray-700">✕</button>
                                            </div>
                                        </template>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 text-gray-500 shrink-0"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.outside="open = false" x-transition
                                    class="absolute left-0 z-[9999] w-full mt-2 bg-white border border-gray-200 rounded-md shadow-lg text-start">
                                    <ul class="py-1 text-gray-700 text-md">
                                        <template x-for="option in options" :key="option">
                                            <li>
                                                <button @click="toggle(option)"
                                                    class="flex items-center justify-between w-full px-4 py-2 text-start hover:bg-gray-100">
                                                    <span x-text="option"></span>
                                                    <span class="w-2.5 h-2.5 rounded-full border border-gray-300"
                                                        :class="selected.includes(option) ? 'bg-[#f37021] border-[#f37021]' : ''">
                                                    </span>
                                                </button>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Search --}}
                        <div
                            class="flex items-center w-full max-w-md px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-[#f37021]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                            <input type="text" placeholder="Search for a project..."
                                class="w-full px-3 py-1 text-base text-gray-700 placeholder-gray-400 bg-transparent border-none focus:outline-none" />
                        </div>
                    </div>


                    {{-- Projects Grid --}}
                    <div class="grid grid-cols-1 gap-5 mt-10 lg:grid-cols-2" data-aos="zoom-in">
                        @foreach ($projects as $item)
                            <a href="{{ route('projects.details', ['id' => $item->id]) }}"
                                class="w-full h-[410px] group overflow-hidden block">
                                <div class="relative h-full">
                                    <img src="{{ asset($item->project_image ?? 'images/placeholder.jpg') }}"
                                        alt="{{ $item->project_title }}"
                                        class="object-cover w-full h-full transition duration-300 group-hover:scale-105">
                                    <div
                                        class="absolute inset-0 transition-all duration-300 opacity-0 bg-gradient-to-t from-black to-transparent group-hover:opacity-100">
                                    </div>
                                    <div
                                        class="absolute transition-all duration-500 opacity-0 bottom-10 left-10 group-hover:opacity-100">
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

                    {{-- Load More / See Less Buttons --}}
                    <div class="flex items-center justify-center gap-6 mt-16">
                        {{-- See Less --}}
                        @if ($page > 1)
                            <a href="?page={{ $page - 1 }}">
                                <div
                                    class="relative flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group">
                                    <div
                                        class="relative z-10 flex items-center justify-center px-8 py-4 overflow-hidden font-medium text-black transition duration-300 bg-black w-fit group">
                                        <span class="font-light text-white poppins-regular text-nowrap"> Previous
                                        </span>
                                        <span
                                            class="absolute -z-10 inset-0 w-0 bg-white/50 skew-x-[-15deg] -left-4 transition-all duration-300 ease-in-out group-hover:w-[calc(100%+30px)] opacity-70"></span>
                                    </div>
                                    <div
                                        class="absolute w-full h-6 px-[71px] border-black border-t border-l border-r group-hover:border-r-2 group-hover:border-l-2 group-hover:border-t-2 -top-1">
                                    </div>
                                    <div
                                        class="absolute w-full h-6 px-[71px] border-black border-b border-l border-r -bottom-1 group-hover:border-b-2 group-hover:border-l-2 group-hover:border-r-2">
                                    </div>
                                    <div
                                        class="absolute bottom-0 z-20 w-[6px] h-[6px] bg-white right-1 group-hover:flex hidden transition duration-300">
                                    </div>
                                </div>
                            </a>
                        @endif

                        {{-- Load More --}}
                        @if ($page < $lastPage)
                            <a href="?page={{ $page + 1 }}">
                                <div
                                    class="relative flex items-center justify-center px-1 transition duration-300 cursor-pointer w-fit group">
                                    <div
                                        class="relative z-10 overflow-hidden w-fit px-8 py-4 flex items-center justify-center font-medium text-black group bg-[#f37021] transition duration-300">
                                        <span class="font-light text-white poppins-regular text-nowrap"> Next </span>
                                        <span
                                            class="absolute -z-10 inset-0 w-0 bg-black/50 skew-x-[-15deg] -left-4 transition-all duration-300 ease-in-out group-hover:w-[calc(100%+30px)] opacity-70"></span>
                                    </div>
                                    <div
                                        class="absolute w-full h-6 px-[71px] border-black border-t border-l border-r group-hover:border-r-2 group-hover:border-l-2 group-hover:border-t-2 -top-1">
                                    </div>
                                    <div
                                        class="absolute w-full h-6 px-[71px] border-black border-b border-l border-r -bottom-1 group-hover:border-b-2 group-hover:border-l-2 group-hover:border-r-2">
                                    </div>
                                    <div
                                        class="absolute bottom-0 z-20 w-[6px] h-[6px] bg-white right-1 group-hover:flex hidden transition duration-300">
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Alpine.js Component for Category Dropdown --}}
    <script>
        function multiSelect() {
            return {
                open: false,
                selected: [],
                options: @json($categories),
                toggleDropdown() {
                    this.open = !this.open;
                },
                toggle(option) {
                    if (this.selected.includes(option)) {
                        this.selected = this.selected.filter(i => i !== option);
                    } else {
                        this.selected.push(option);
                    }
                },
                remove(option) {
                    this.selected = this.selected.filter(i => i !== option);
                },
            };
        }
    </script>
@endsection
