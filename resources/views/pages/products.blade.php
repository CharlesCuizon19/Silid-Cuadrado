@extends('layouts.app')

@section('content')
    <div class="bg-[#f2f2f2] h-full">
        <x-banner page='All Products' extension1=">" breadcrumb1='Products' img='images/products-banner.png' />

        <div class="pt-20 pb-52">
            <div class="container mx-auto">
                <div class="flex flex-col gap-3 poppins-regular">
                    <div class="text-xl font-medium">
                        Showing {{ ($page - 1) * $perPage + 1 }}–
                        {{ min($page * $perPage, $total) }} of {{ $total }} results
                    </div>

                    {{-- Filter + Sort + Search --}}
                    <div class="flex justify-between" data-aos="zoom-in">
                        <div class="flex gap-2">
                            {{-- Category Dropdown --}}
                            <div x-data="multiSelect()" class="relative">
                                <button @click="toggleDropdown"
                                    class="flex items-center justify-between px-4 py-3 bg-white rounded-md shadow-sm w-60 hover:bg-gray-50">
                                    <div class="flex flex-wrap items-center gap-1 text-lg text-gray-800">
                                        <template x-if="selected.length === 0">
                                            <span>Category</span>
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
                                    class="absolute left-0 z-10 mt-2 bg-white border border-gray-200 rounded-md shadow-lg w-60">
                                    <ul class="py-1 text-lg text-gray-700">
                                        <template x-for="option in options" :key="option">
                                            <li>
                                                <button @click="toggle(option)"
                                                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
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

                            {{-- Sort Dropdown --}}
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center justify-between w-40 px-4 py-3 bg-white rounded-md shadow-sm hover:bg-gray-50">
                                    <span class="text-lg text-gray-800">Sort by</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="open" @click.outside="open = false"
                                    class="absolute left-0 z-10 w-40 mt-2 bg-white border border-gray-200 rounded-md shadow-lg">
                                    <ul class="py-1 text-lg text-gray-700">
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Newest</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Oldest</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">A–Z</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Z–A</a></li>
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

                            <input type="text" placeholder="Search for a product..."
                                class="w-full px-3 py-1 text-base text-gray-700 placeholder-gray-400 bg-transparent border-none focus:outline-none" />
                        </div>
                    </div>

                    {{-- Product Grid --}}
                    <div class="grid grid-cols-3 gap-5 mt-10 gap-y-14" data-aos="zoom-in">
                        @foreach ($products as $item)
                            <a href="{{ route('products.details', ['id' => $item->id]) }}">
                                <div class="flex flex-col gap-5 cursor-pointer group">
                                    <div class="relative w-[500px] h-auto">
                                        <div class="overflow-hidden">
                                            <img src="{{ asset($item->img) }}" alt="{{ $item->name }}"
                                                class="object-cover w-full h-auto transition duration-500 ease-in-out group-hover:scale-105">
                                        </div>
                                        <div
                                            class="absolute inset-0 transition duration-500 ease-in-out opacity-0 bg-black/50 group-hover:opacity-100">
                                            <div class="flex justify-center h-full">
                                                <div class="flex items-center justify-center gap-3 poppins-regular">
                                                    <div class="text-white transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="3"
                                                                d="M21 21l-4.35-4.35m1.1-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                                                        </svg>
                                                    </div>
                                                    <div class="text-white">
                                                        View Product
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="text-2xl transition duration-500 ease-in-out magistral-medium group-hover:text-[#f37021]">
                                        {{ $item->name }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="flex items-center justify-center gap-3 mt-16">
                        {{-- Previous button --}}
                        @if ($page > 1)
                            <a href="?page={{ $page - 1 }}"
                                class="flex items-center justify-center border border-gray-300 rounded-full w-10 h-10 hover:bg-[#f37021] hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14 7-5 5 5 5" />
                                </svg>
                            </a>
                        @endif

                        {{-- Page numbers --}}
                        @for ($i = 1; $i <= $lastPage; $i++)
                            <a href="?page={{ $i }}"
                                class="px-4 py-2 border border-gray-300 rounded-full text-sm transition duration-300
                        {{ $i == $page ? 'bg-[#f37021] text-white border-[#f37021]' : 'hover:bg-[#f37021] hover:text-white' }}">
                                {{ $i }}
                            </a>
                        @endfor

                        {{-- Next button --}}
                        @if ($page < $lastPage)
                            <a href="?page={{ $page + 1 }}"
                                class="flex items-center justify-center border border-gray-300 rounded-full w-10 h-10 hover:bg-[#f37021] hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m10 17 5-5-5-5" />
                                </svg>
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
                options: [
                    'Steel & Metal Fabrication',
                    'Electrical Works',
                    'Refrigeration & Airconditioning',
                    'Interior Fit-out',
                ],
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
