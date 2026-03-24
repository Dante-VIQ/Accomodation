@extends('layouts.app')

{{-- Meta Tags --}}
@section('title', 'About Villa Veh - Luxury Accommodation with Game View in Nakuru, Kenya')
@section('meta_description', 'Learn about Villa Veh, the most recommended vacation rental overlooking Lake Nakuru National Park. Discover our story, amenities, and commitment to exceptional safari experiences.')
@section('meta_keywords', 'about Villa Veh, Nakuru luxury hotel history, Lake Nakuru accommodation, family-owned hotel Nakuru, Kenya safari lodge, about us, our story')

{{-- Open Graph --}}
@section('og_title', 'About Villa Veh - Our Story & Luxury Accommodation')
@section('og_description', 'Discover the story behind Villa Veh, your premier luxury accommodation with game view overlooking Lake Nakuru National Park.')
@section('og_image', asset('images/about-villa-veh.jpg'))

{{-- Canonical URL --}}
@section('canonical_url', route('about'))

{{-- Push Schemas to Stack --}}
@push('schema')
<script type="application/ld+json">
@php
$aboutPageSchema = [
    "@context" => "https://schema.org",
    "@type" => "AboutPage",
    "@id" => "https://villaveh.com/about/#aboutpage",
    "name" => "About Villa Veh - Luxury Accommodation Nakuru",
    "url" => "https://villaveh.com/about",
    "description" => "Learn about Villa Veh, the most recommended vacation rental overlooking Lake Nakuru National Park. Discover our story, amenities, and commitment to exceptional safari experiences.",
    "mainEntity" => [
        "@type" => "Hotel",
        "@id" => "https://villaveh.com/#hotel"
    ]
];
@endphp
{!! json_encode($aboutPageSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

<script type="application/ld+json">
@php
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "@id" => "https://villaveh.com/about/#breadcrumb",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => "https://villaveh.com"
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "About Us",
            "item" => "https://villaveh.com/about"
        ]
    ]
];
@endphp
{!! json_encode($breadcrumbSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

<script type="application/ld+json">
@php
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type" => "ItemList",
    "@id" => "https://villaveh.com/about/#services",
    "name" => "Villa Veh Services",
    "description" => "Premium services offered at Villa Veh luxury accommodation",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Map Direction",
            "item" => [
                "@type" => "Service",
                "name" => "Location & Directions",
                "description" => "Easy access to Villa Veh with detailed directions from major cities"
            ]
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Accommodation Services",
            "item" => [
                "@type" => "Service",
                "name" => "Luxury Accommodation",
                "description" => "High-end rooms with premium amenities and game view"
            ]
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => "Great Experience",
            "item" => [
                "@type" => "Service",
                "name" => "Safari Experience",
                "description" => "Unforgettable game viewing and safari experiences"
            ]
        ]
    ]
];
@endphp
{!! json_encode($serviceSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<nav aria-label="Breadcrumb" class="text-sm hidden">
    <ol class="list-reset flex text-gray-600" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex items-center">
            <a itemprop="item" href="/home" class="hover:text-emerald-600">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1" />
            <span class="mx-2 text-gray-400">/</span>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name" class="text-hotel-gold font-semibold">About Us</span>
            <meta itemprop="position" content="2" />
        </li>
    </ol>
</nav>
@endsection

{{-- Main Content --}}
@section('content')
@include('partials.about-us')
@endsection

{{-- Page-specific styles --}}
@push('styles')
<style>
    .animation-delay-200 {
        animation-delay: 200ms;
    }
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
    }
    .animate-fade-in {
        animation: fade-in 0.6s ease-out forwards;
    }
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endpush

{{-- Page-specific scripts --}}
@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        // Add any Livewire event listeners here
    });
</script>
@endpush