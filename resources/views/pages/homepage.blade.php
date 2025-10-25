@extends('layouts.app')

@section('content')
    <div class="h-full bg-[#f2f2f2]">
        @include('partials.homepage-banner')

        @include('pages.homepage-tabs.we-offer')

        @include('pages.homepage-tabs.about-us')

        @include('pages.homepage-tabs.products')

        @include('pages.homepage-tabs.our-expertise')

        @include('pages.homepage-tabs.featured-projects')
    </div>
@endsection
