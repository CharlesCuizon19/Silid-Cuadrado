@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center space-y-6">
    <!-- Logo -->
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/icon-img.png') }}" alt="Silid Cuadrado Logo"
            class="h-28 w-auto mb-4 drop-shadow-[0_0_25px_rgba(243,112,33,0.4)]">

        <!-- Welcome Title -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#f37021] tracking-wide">
            Welcome Back, {{ Auth::user()->name ?? 'Administrator' }}!
        </h1>

        <!-- Subtitle -->
        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mt-4">
            You’re now logged in to the <span class="text-[#f37021] font-semibold">Silid Cuadrado</span> Admin Panel.
            Manage your content, banners, and website updates efficiently.
        </p>
    </div>

    <!-- Optional Button -->
    <div class="mt-8">
        <a href="{{ route('admin.banners.index') }}"
            class="px-8 py-3 bg-[#f37021] text-white font-semibold rounded-lg shadow-lg 
            hover:bg-[#a63e00] hover:shadow-[0_0_20px_rgba(243,112,33,0.5)] transition duration-300">
            Go to Homepage Banners
        </a>
    </div>
</div>
@endsection