<header x-data="{ scrolled: false, open: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    :class="scrolled
        ?
        'bg-black/80 backdrop-blur-sm shadow-lg translate-y-0 py-2' :
        'bg-[#121212]/70 backdrop-blur-sm -translate-y-2 py-5'"
    class="fixed top-0 left-0 z-50 w-full text-white transition-all duration-500">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">

        <!-- Logo -->
        <a href="/" class="z-50 flex items-center space-x-3">
            <img src="/images/logo.png" alt="Silid Cuadrado Logo" class="w-[300px] 2xl:w-[458px] h-auto">
        </a>

        <!-- Burger button (mobile only) -->
        <button @click="open = !open"
            class="z-50 flex flex-col items-end justify-center w-8 h-8 space-y-1 md:hidden focus:outline-none">
            <span :class="open ? 'w-6 rotate-45 translate-y-[6px]' : 'w-6'"
                class="h-[2px] bg-white transition-all duration-300"></span>
            <span :class="open ? 'opacity-0' : 'opacity-100'"
                class="h-[2px] w-6 bg-white transition-all duration-300"></span>
            <span :class="open ? 'w-6 -rotate-45 -translate-y-[6px]' : 'w-6'"
                class="h-[2px] bg-white transition-all duration-300"></span>
        </button>

        <!-- Desktop Navigation -->
        <nav class="items-center hidden space-x-8 md:flex ">
            <div class="items-center hidden space-x-12 md:flex">
                <a href="{{ route('homepage') }}"
                    class="transition hover:text-[#f37021] poppins-regular {{ Route::is('homepage') ? 'font-bold text-[#f37021]' : 'font-light' }}">Home</a>
                <a href="{{ route('about_us') }}"
                    class="transition hover:text-[#f37021] poppins-regular {{ Route::is('about_us') ? 'font-bold text-[#f37021]' : 'font-light' }}">About
                    Us</a>
                <a href="{{ route('products.show') }}"
                    class="transition hover:text-[#f37021] poppins-regular {{ Route::is('products.*') ? 'font-bold text-[#f37021]' : 'font-light' }}">Products</a>
                <a href="{{ route('services.show') }}"
                    class="transition hover:text-[#f37021] poppins-regular {{ Route::is('services.*') ? 'font-bold text-[#f37021]' : 'font-light' }}">Services</a>
                <a href="{{ route('projects.show') }}"
                    class="transition hover:text-[#f37021] poppins-regular {{ Route::is('projects.*') ? 'font-bold text-[#f37021]' : 'font-light' }}">Projects</a>
            </div>
            <!-- Right Side (desktop) -->
            <div class="items-center hidden space-x-8 md:flex">
                <x-button border='border-white' link="contact-us" text="Contact Us" textcolor="white"
                    bgcolor="[#f37021]" bghovercolor="[#f37021]/20" />
                <button class="text-white transition hover:text-[#f37021]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.1-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </button>
            </div>
        </nav>

    </div>

    <!-- Mobile Navigation Menu -->
    <nav x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="absolute top-0 left-0 z-40 w-full bg-black/95 backdrop-blur-md md:hidden">
        <div class="flex flex-col items-center justify-center h-full py-[10rem] space-y-6">
            <a href="{{ route('homepage') }}"
                class="transition hover:text-[#f37021] poppins-regular text-md {{ Route::is('homepage') ? 'font-bold text-[#f37021]' : 'font-light' }}">Home</a>
            <a href="{{ route('about_us') }}"
                class="transition hover:text-[#f37021] poppins-regular text-md {{ Route::is('about_us') ? 'font-bold text-[#f37021]' : 'font-light' }}">About
                Us</a>
            <a href="{{ route('products.show') }}"
                class="transition hover:text-[#f37021] poppins-regular text-md {{ Route::is('products.*') ? 'font-bold text-[#f37021]' : 'font-light' }}">Products</a>
            <a href="{{ route('services.show') }}"
                class="transition hover:text-[#f37021] poppins-regular text-md {{ Route::is('services.*') ? 'font-bold text-[#f37021]' : 'font-light' }}">Services</a>
            <a href="{{ route('projects.show') }}"
                class="transition hover:text-[#f37021] poppins-regular text-md {{ Route::is('projects.*') ? 'font-bold text-[#f37021]' : 'font-light' }}">Projects</a>

            <div class="pt-4">
                <x-button border='border-white' link="homepage" text="Contact Us" textcolor="white" bgcolor="[#f37021]"
                    bghovercolor="bg-[#a63e00]" />
            </div>
        </div>
    </nav>
</header>
