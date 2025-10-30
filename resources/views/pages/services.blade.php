@extends('layouts.app')


@section('content')
    <div>
        <x-banner page='Our Services' extension1=">" breadcrumb1='Services' img='images/services-banner.png' />

        <div class="container h-full pt-20 mx-auto pb-36" data-aos="zoom-in">
            <div class="grid grid-cols-3 gap-5 mx-3 mt-10 gap-y-16 gap-x-10 2xl:mx-0">
                @foreach ($paginatedServices as $item)
                    <a href="{{ route('services.details', ['id' => $item->id]) }}">
                        <div class="flex flex-col justify-between h-full gap-5 cursor-pointer group">
                            <img src="{{ asset($item->img) }}" alt="" class="w-20 h-auto 2xl:w-28 spin-y-hover">

                            <div class="flex flex-col items-start justify-start gap-5">
                                <div
                                    class="text-2xl font-bold magistral-medium group-hover:text-[#f37021] transition duration-300">
                                    {{ $item->title }}
                                </div>
                                <div class="poppins-regular text-black/70 line-clamp-2">
                                    {{ $item->description }}
                                </div>
                                <div
                                    class="flex group items-center gap-3 font-bold poppins-regular text-[#f37021] transition duration-300">
                                    <div>
                                        View Details
                                    </div>
                                    <div class="transition ease-in-out group-hover:translate-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m10 17l5-5l-5-5" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-center gap-3 mt-16">
                {{-- Previous button --}}
                @if ($page > 1)
                    <a href="?page={{ $page - 1 }}"
                        class="flex items-center justify-center border border-gray-300 rounded-full w-10 h-10 hover:bg-[#f37021] hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14 7-5 5 5 5" />
                        </svg>
                    </a>
                @endif

                {{-- Page numbers --}}
                @for ($i = 1; $i <= $pages; $i++)
                    <a href="?page={{ $i }}"
                        class="px-4 py-2 border border-gray-300 rounded-full text-sm transition duration-300
                        {{ $i == $page ? 'bg-[#f37021] text-white border-[#f37021]' : 'hover:bg-[#f37021] hover:text-white' }}">
                        {{ $i }}
                    </a>
                @endfor

                {{-- Next button --}}
                @if ($page < $pages)
                    <a href="?page={{ $page + 1 }}"
                        class="flex items-center justify-center border border-gray-300 rounded-full w-10 h-10 hover:bg-[#f37021] hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m10 17 5-5-5-5" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <style>
        .spin-y-hover {
            transition: transform 0.8s ease;
            transform-style: preserve-3d;
        }

        .spin-y-hover:hover {
            transform: rotateY(360deg);
        }

        @media (max-width: 768px) {
            .grid-cols-3 {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
@endsection
