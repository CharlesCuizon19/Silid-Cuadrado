<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SILID CUADRADO</title>
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</body>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
    AOS.init({
        duration: 600, // delay in milliseconds (e.g., 300ms = 0.3s)
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".count-up");

        const startCounting = (el) => {
            const target = parseInt(el.getAttribute("data-target")) || 0;
            const duration = parseInt(el.getAttribute("data-duration")) || 1500;
            const valueEl = el.querySelector(".count-value");
            if (!valueEl) return;

            let current = 0;
            const step = target / (duration / 20);

            const interval = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(interval);
                }
                // Format number with commas (thousand separators)
                valueEl.textContent = Math.floor(current).toLocaleString();
            }, 20);
        };

        // Only trigger when visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    startCounting(entry.target);
                    entry.target.dataset.counted = "true";
                }
            });
        }, {
            threshold: 0.6
        });

        counters.forEach(counter => observer.observe(counter));
    });
</script>





</html>
