@extends('layouts.app')

@section('content')
    <div>
        <x-banner page='Our Services' extension1=">" breadcrumb1='Services' img='images/services-banner.png' />

        <div class="container h-full pt-20 2xl:mx-auto pb-36" data-aos="zoom-in">
            <div class="grid grid-cols-3 gap-5 mx-3 mt-10 gap-y-16 gap-x-10">
                @forelse ($services as $item)
                    <a href="{{ route('services.details', ['id' => $item->id]) }}">
                        <div class="flex flex-col justify-between h-full gap-5 cursor-pointer group">
                            <!-- Thumbnail or placeholder -->
                            <img src="{{ asset($item->icon ?? 'images/default-service.png') }}" alt="{{ $item->title }}"
                                class="h-auto w-28 spin-y-hover">

                            <div class="flex flex-col items-start justify-start gap-5">
                                <div
                                    class="text-2xl font-bold magistral-medium group-hover:text-[#f37021] transition duration-300">
                                    {{ $item->title }}
                                </div>
                                <div class="poppins-regular text-black/70 line-clamp-2">
                                    {{ $item->short_description ?? 'No description available.' }}
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
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        No services available at the moment.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-center mt-16">
                {{ $services->links() }}
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
