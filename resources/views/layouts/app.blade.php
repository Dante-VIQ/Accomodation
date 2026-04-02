<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic Meta Tags - These will be overridden by child pages --}}
    <title>@yield('title', 'Villa Veh - Luxury Accommodation in Nakuru, Kenya')</title>
    <meta name="description" content="@yield('meta_description', 'Experience luxury at Villa Veh in Nakuru, Kenya. GameView neighbours Lake Nakuru National park. Book high-end rooms with premium amenities near the big five.')">
    <meta name="keywords" content="@yield('meta_keywords', 'luxury hotel Nakuru, Lake Nakuru accommodation, Villa Veh, game view lodge, Kenya safari hotel, big five viewing, Nakuru National Park lodging, vacation rental Kenya')">

    {{-- Canonical URL --}}
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    {{-- Robots Control --}}
    <meta name="robots" content="@yield('robots', 'index, follow')">

    {{-- Open Graph Tags --}}
    <meta property="og:site_name" content="Villa Veh">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'Villa Veh - Luxury Accommodation in Nakuru')">
    <meta property="og:description" content="@yield('og_description', 'Experience luxury at Villa Veh with game view overlooking Lake Nakuru National Park. Book your stay near the big five.')">
    <meta property="og:image" content="@yield('og_image', asset('images/villa-veh-hero.jpg'))">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Cards --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@VillaVeh">
    <meta name="twitter:title" content="@yield('twitter_title', 'Villa Veh - Luxury Accommodation')">
    <meta name="twitter:description" content="@yield('twitter_description', 'GameView neighbours Lake Nakuru National park. Home to some of the big five.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/villa-veh-hero.jpg'))">

    {{-- Geo Tags for Local SEO --}}
    <meta name="geo.region" content="KE-31"> {{-- KE-31 is Nakuru county code --}}
    <meta name="geo.placename" content="Nakuru, Kenya">
    <meta name="geo.position" content="-0.3031;36.0800"> {{-- Nakuru coordinates --}}
    <meta name="ICBM" content="-0.3031, 36.0800">

    {{-- Fonts and Styles --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    {{-- Tailwind Configuration --}}
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

<script src="https://analytics.ahrefs.com/analytics.js" data-key="HobhOa+QCCEpkfABYJb44Q" async></script>

    {{-- Schema.org markup will be injected by child pages in the schema section --}}
    @yield('schema')
      {{-- Schema Stack --}}
    @stack('schema')

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-hotel-cream font-sans">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        {{-- Page Header --}}
        @hasSection('header')
            <header class="bg-white shadow hidden">
                <div class="max-w-7xl mx-auto py-0 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        {{-- Breadcrumbs for SEO --}}
        @hasSection('breadcrumbs')
            <div class="bg-gray-50 border-b hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                    @yield('breadcrumbs')
                </div>
            </div>
        @endif

        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
  <footer class="bg-stone-900 text-stone-300 py-12 border-t border-stone-800">
    <div class="container mx-auto px-6 md:px-12">
      <div class="flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="text-center md:text-left">
          <div class="logo-font text-2xl font-semibold text-white">Villaveh <span class="text-amber-400">Gameview</span></div>
          <p class="text-sm mt-2 max-w-sm">Luxury BnB • Nakuru City • Where the savannah meets sublime comfort.</p>
        </div>
        <div class="flex gap-6 text-xl">
          <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-x-twitter"></i></a>
          <a href="#" class="hover:text-amber-400 transition"><i class="fab fa-tripadvisor"></i></a>
        </div>
        <div class="text-sm text-stone-400">
          © 2026 Villaveh Gameview — Regal Stays in Nakuru
        </div>
      </div>
    </div>
  </footer>

    @livewireScripts

    {{-- Custom Scripts --}}
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
                        this.currentIndex = (this.currentIndex >= maxIndex) ? 0 : this.currentIndex + 1;
                    }, 3500);
                },

                updateWidth() {
                    const wrapperWidth = document.querySelector('[x-data]').clientWidth;
                    this.slideWidth = window.innerWidth >= 768 ? wrapperWidth / 3 : wrapperWidth;
                }
            }
        }
    </script>
  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    if(menuToggle) {
      menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    }
    // smooth anchor closing mobile
    document.querySelectorAll('#mobileMenu a').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
      });
    });
  </script>
    {{-- Additional page-specific scripts --}}
    @yield('scripts')
</body>
</html>
