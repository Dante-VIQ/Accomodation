<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hotel-gold': '#D4AF37',
                        'hotel-navy': '#1E3A5F',
                        'hotel-cream': '#F8F4E9',
                        'hotel-brown': '#8B7355',
                    },
                    fontFamily: {
                        'serif': ['Playfair Display', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-hotel-cream font-sans">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

            <footer class="bg-gray-900 text-white py-10 p-5">
            <div class="container mx-auto grid md:grid-cols-4 gap-8">
                <div>
                    <h2 class="text-xl font-bold mb-2"><a href="#" class="logo">VillaVeh</a></h2>
                    <p class="mb-2">VillaVeh GameView neighbours Lake Nakuru National park. Home to some of the big
                        five.</p>
                    <a href="#" class="text-emerald-400">Read more <span
                            class="fa fa-chevron-right text-xs"></span></a>
                </div>
                <div>
                    <h2 class="text-xl font-bold mb-2">Services</h2>
                    <ul class="list-disc pl-5">
                        <li>Map Direction</li>
                        <li>Accomodation Services</li>
                        <li>Great Experience</li>
                        <li>Perfect central location</li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-xl font-bold mb-2">Tag cloud</h2>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-emerald-600 px-2 py-1 rounded">apartment</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">home</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">vacation</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">rental</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">rent</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">house</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">place</span>
                        <span class="bg-emerald-600 px-2 py-1 rounded">drinks</span>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-bold mb-2">Subscribe</h2>
                    <form action="#" class="flex flex-col gap-2">
                        <input type="email" placeholder="Enter email address" class="input" />
                        <button type="submit" class="btn-primary">Subscribe</button>
                    </form>
                    <h2 class="text-xl font-bold mt-5 mb-2">Follow us</h2>
                    <ul class="flex gap-3">
                        <li><a href="#" class="text-white"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#" class="text-white"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class="text-white"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div
                class="container mx-auto mt-10 border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm">&copy; {{ date('Y') }} VillaVeh. All rights reserved.</div>
                <div class="text-sm md:text-right">Designed by Daniel Mwangi</div>
            </div>
        </footer>
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    @livewireScripts
    <script>
        function testimonialSlider(totalItems) {
            return {
                currentIndex: 0,
                slideWidth: 0,
                totalItems,

                start() {
                    this.updateWidth();

                    window.addEventListener('resize', () => this.updateWidth());

                    setInterval(() => {
                        const itemsPerView = window.innerWidth >= 768 ? 3 : 1;
                        const maxIndex = this.totalItems - itemsPerView;

                        this.currentIndex =
                            (this.currentIndex >= maxIndex) ? 0 : this.currentIndex + 1;
                    }, 3500);
                },

                updateWidth() {
                    const wrapperWidth = document.querySelector('[x-data]').clientWidth;
                    this.slideWidth = window.innerWidth >= 768 ?
                        wrapperWidth / 3 :
                        wrapperWidth;
                }
            }
        }
    </script>
</body>

</html>
