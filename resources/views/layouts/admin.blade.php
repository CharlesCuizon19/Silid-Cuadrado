<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Silid Cuadrado Admin')</title>
    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- DataTables & SweetAlert -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon-img.png') }}">
</head>

<body x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-[#121212] text-white">

    {{-- Sidebar --}}
    <!-- Sidebar -->
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="bg-[#1a1a1a] flex-shrink-0 flex flex-col justify-between min-h-screen transition-all duration-300 shadow-lg border-r border-[#2c2c2c]">

        <!-- Top Section -->
        <div>
            <!-- Logo + Toggle -->
            <div class="flex items-center justify-between p-4 border-b border-[#2c2c2c]">
                <!-- Full Logo -->
                <img src="{{ asset('images/icon-img.png') }}" alt="Silid Cuadrado Logo"
                    class="h-10 w-auto" x-show="sidebarOpen" x-transition>

                <!-- Small Logo -->
                <img src="{{ asset('images/icon-img.png') }}" alt="Logo"
                    class="h-10 w-auto mx-auto" x-show="!sidebarOpen" x-transition>

                <!-- Toggle Button -->
                <button class="text-gray-400 hover:text-[#f37021]" @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 transform transition-transform duration-300"
                        :class="sidebarOpen ? 'rotate-0' : 'rotate-180'"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="p-4 text-sm">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.dashboard') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- Homepage Banner -->
                    <li>
                        <a href="{{ route('admin.banners.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.banners.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v16H4V4z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Homepage Banner</span>
                        </a>
                    </li>

                    <!-- Project Categories -->
                    <li>
                        <a href="{{ route('admin.projectCategories.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.projectCategories.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Projects Categories</span>
                        </a>
                    </li>

                    <!-- Projects -->
                    <li>
                        <a href="{{ route('admin.projects.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.projects.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Projects</span>
                        </a>
                    </li>

                    <!-- Services -->
                    <li>
                        <a href="{{ route('admin.services.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.services.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6h6v6H9z M3 3h18v18H3V3z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Services</span>
                        </a>
                    </li>

                    <!-- Product Categories -->
                    <li>
                        <a href="{{ route('admin.productCategories.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.productCategories.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Product Categories</span>
                        </a>
                    </li>

                    <!-- Products -->
                    <li>
                        <a href="{{ route('admin.products.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.products.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18M3 18h18" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Products</span>
                        </a>
                    </li>

                    <!-- Contacts -->
                    <li>
                        <a href="{{ route('admin.contacts.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.contacts.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Contact Us</span>
                        </a>
                    </li>

                    <!-- Newsletters -->
                    <li>
                        <a href="{{ route('admin.newsletters.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('admin.newsletters.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Newsletters</span>
                        </a>
                    </li>

                    <!-- Product Inquiries -->
                    <li>
                        <a href="{{ route('admin.product_inquiries.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.product_inquiries.*') ? 'bg-[#f37021]/20 text-[#f37021]' : 'hover:bg-[#f37021]/10 text-gray-300 hover:text-white' }}"
                            :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 2h6a2 2 0 012 2v1h1a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h1V4a2 2 0 012-2zM9 9h6M9 13h6M9 17h3" />
                            </svg>
                            <span x-show="sidebarOpen" x-transition class="ml-3">Product Inquiries</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}" class="p-4 border-t border-[#2c2c2c]">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg font-semibold text-gray-300 hover:bg-[#f37021]/10 hover:text-[#f37021] transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
                <span x-show="sidebarOpen" x-transition>Logout</span>
            </button>
        </form>
    </aside>


    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-[#1a1a1a] border-b border-[#2c2c2c] p-4 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-[#f37021]">@yield('title')</h1>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 bg-[#121212] text-gray-100">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>

<style>
    table.dataTable thead th {
        border-bottom: 1px solid #d1d5db;
        border-left: 1px solid #d1d5db;
        border-right: 1px solid #d1d5db;
        font-size: 12px;
        font-weight: bold;
        padding: 4px;
    }

    table.dataTable td {
        border-bottom: 1px solid #d1d5db;
        border-left: 1px solid #d1d5db;
        border-right: 1px solid #d1d5db;
        font-size: 11px;
        padding: 0;
    }

    table.dataTable tfoot th,
    table.dataTable tfoot td {
        border-top: 2px solid #d1d5db;
        border-left: 1px solid #d1d5db;
        border-right: 1px solid #d1d5db;
        font-size: 11px;
        font-weight: bold;
    }
</style>