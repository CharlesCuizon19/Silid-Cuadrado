@extends('layouts.app')

@section('content')
    <div class="bg-[#f2f2f2] h-full">
        <x-banner page='All Products' extension1=">" breadcrumb1='Products' img='images/products-banner.png' />

        <div class="pt-20 mx-3 pb-52">
            <div class="container mx-auto">
                <div class="flex flex-col gap-3 poppins-regular">

                    <div class="text-xl font-medium">
                        Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results
                    </div>

                    {{-- Filter + Sort + Search --}}
                    <form method="GET" class="relative z-30 flex flex-col gap-5 lg:justify-between lg:flex-row"
                        data-aos="zoom-in">
                        <div class="flex gap-2">
                            {{-- Category Dropdown --}}
                            <div x-data="multiSelect(@js($categories), @js(request('categories', [])))" class="relative">
                                <button @click="toggleDropdown" type="button"
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
                                    class="absolute left-0 z-[9999] mt-2 bg-white border border-gray-200 rounded-md shadow-lg w-60">
                                    <ul class="py-1 text-lg text-gray-700">
                                        <template x-for="option in options" :key="option">
                                            <li>
                                                <button type="button" @click="toggle(option)"
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
                                <template x-for="value in selected">
                                    <input type="hidden" name="categories[]" :value="value">
                                </template>
                            </div>

                            {{-- Sort Dropdown --}}
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" type="button"
                                    class="flex items-center justify-between w-40 px-4 py-3 bg-white rounded-md shadow-sm hover:bg-gray-50">
                                    <span class="text-lg text-gray-800">
                                        Sort by {{ ucfirst(request('sort', '')) ?: '' }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.outside="open = false"
                                    class="absolute left-0 z-[9999] w-40 mt-2 bg-white border border-gray-200 rounded-md shadow-lg">
                                    <ul class="py-1 text-lg text-gray-700">
                                        @foreach (['newest' => 'Newest', 'oldest' => 'Oldest', 'a-z' => 'A–Z', 'z-a' => 'Z–A'] as $key => $label)
                                            <li>
                                                <button type="submit" name="sort" value="{{ $key }}"
                                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">
                                                    {{ $label }}
                                                </button>
                                            </li>
                                        @endforeach
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
                            <input type="text" name="search" placeholder="Search for a product..."
                                value="{{ request('search') }}"
                                class="w-full px-3 py-1 text-base text-gray-700 placeholder-gray-400 bg-transparent border-none focus:outline-none" />
                        </div>
                    </form>

                    {{-- Product Grid --}}
                    <div class="grid gap-5 mt-10 md:grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-y-14" data-aos="zoom-in">
                        @forelse ($products as $item)
                            <a href="{{ route('products.details', ['id' => $item->id]) }}" class=" w-fit">
                                <div class="flex flex-col gap-5 cursor-pointer group">
                                    <div class="relative w-auto h-[20rem]">
                                        <div class="h-full overflow-hidden">
                                            <img src="{{ asset($item->thumbnail ?? 'images/default-product.png') }}"
                                                alt="{{ $item->title }}"
                                                class="object-cover w-full h-[20rem] transition duration-500 ease-in-out group-hover:scale-105">
                                        </div>
                                        <div
                                            class="absolute inset-0 transition duration-500 ease-in-out opacity-0 bg-black/50 group-hover:opacity-100">
                                            <div class="flex justify-center h-full">
                                                <div class="flex items-center justify-center gap-3 poppins-regular">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3"
                                                            d="M21 21l-4.35-4.35m1.1-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                                                    </svg>
                                                    <div class="text-white">View Product</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="text-2xl transition duration-500 ease-in-out magistral-medium group-hover:text-[#f37021]">
                                        {{ $item->title }}
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-3 text-center text-gray-500">No products found.</div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="flex justify-center mt-16">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function multiSelect(options = [], selectedInitial = []) {
            return {
                open: false,
                options: options,
                selected: selectedInitial,
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
