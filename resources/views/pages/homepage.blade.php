@extends('layouts.app')

@section('content')
    <div class="h-full bg-gray-500">
        @include('partials.homepage-banner')

        @include('pages.homepage-tabs.we-offer')
    </div>
@endsection
