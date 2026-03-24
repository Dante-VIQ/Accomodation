@extends('layouts.app')

{{-- Meta Tags --}}
@section('title', 'Villa Veh - Luxury Accommodation with Game View in Nakuru, Kenya')
@section('meta_description', 'Experience luxury at Villa Veh in Nakuru, Kenya. GameView neighbours Lake Nakuru National
    Park. Book high-end rooms with premium amenities near the big five. Perfect safari getaway.')
@section('meta_keywords', 'Villa Veh, Nakuru luxury hotel, Lake Nakuru accommodation, game view lodge, Kenya safari
    hotel, big five viewing, Nakuru National Park lodging, vacation rental Kenya, luxury safari lodge')

    {{-- Open Graph --}}
@section('og_title', 'Villa Veh - Luxury Accommodation with Game View in Nakuru')
@section('og_description', 'GameView neighbours Lake Nakuru National park. Home to some of the big five. Book your
    luxury stay with breathtaking views.')
@section('og_image', asset('images/villa-veh-hero.jpg'))

{{-- Push Schemas to Stack --}}
@push('schema')
    <script type="application/ld+json">
@php
$hotelSchema = [
    "@context" => "https://schema.org",
    "@type" => "Hotel",
    "@id" => "https://villaveh.com/#hotel",
    "name" => "Villa Veh",
    "url" => "https://villaveh.com",
    "logo" => asset('images/logo.png'),
    "image" => asset('images/villa-veh-hero.jpg'),
    "description" => "Luxury accommodation with game view overlooking Lake Nakuru National Park. Home to some of the big five. Experience premium comfort with breathtaking views of flamingos and wildlife.",
    "address" => [
        "@type" => "PostalAddress",
        "streetAddress" => "GameView, Lake Nakuru National Park",
        "addressLocality" => "Nakuru",
        "addressRegion" => "Nakuru County",
        "postalCode" => "20100",
        "addressCountry" => "KE"
    ],
    "geo" => [
        "@type" => "GeoCoordinates",
        "latitude" => -0.3031,
        "longitude" => 36.0800
    ],
    "telephone" => "+254700000000",
    "email" => "info@villaveh.com",
    "checkinTime" => "14:00",
    "checkoutTime" => "11:00",
    "priceRange" => "$$$",
    "amenities" => [
        "Game View",
        "Free WiFi",
        "Air Conditioning",
        "Kitchen Facilities",
        "Laundry Service",
        "Complimentary Tea & Coffee",
        "Hot Showers",
        "Safari Tours",
        "Restaurant",
        "Parking"
    ],
    "sameAs" => [
        "https://facebook.com/villaveh",
        "https://instagram.com/villaveh",
        "https://twitter.com/villaveh",
        "https://www.tripadvisor.com/villaveh"
    ],
    "hasMap" => "https://maps.google.com/?q=Lake+Nakuru+National+Park+Villa+Veh",
    "areaServed" => [
        ["@type" => "City", "name" => "Nakuru"],
        ["@type" => "City", "name" => "Naivasha"],
        ["@type" => "City", "name" => "Nairobi"],
        ["@type" => "City", "name" => "Eldoret"],
        ["@type" => "City", "name" => "Kisumu"]
    ],
    "aggregateRating" => [
        "@type" => "AggregateRating",
        "ratingValue" => "4.9",
        "reviewCount" => "350",
        "bestRating" => "5",
        "worstRating" => "1"
    ]
];
@endphp
{!! json_encode($hotelSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

    <script type="application/ld+json">
@php
$attractionSchema = [
    "@context" => "https://schema.org",
    "@type" => "TouristAttraction",
    "@id" => "https://villaveh.com/#attraction",
    "name" => "Lake Nakuru National Park",
    "url" => "https://villaveh.com/lake-nakuru",
    "image" => asset('images/lake-nakuru-flamingos.jpg'),
    "description" => "Famous for its thousands of flamingos and home to the big five including lions, rhinos, and leopards. A must-visit Kenya safari destination.",
    "address" => [
        "@type" => "PostalAddress",
        "addressLocality" => "Nakuru",
        "addressRegion" => "Nakuru County",
        "addressCountry" => "KE"
    ],
    "geo" => [
        "@type" => "GeoCoordinates",
        "latitude" => -0.3667,
        "longitude" => 36.0833
    ],
    "openingHoursSpecification" => [
        [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            "opens" => "06:00",
            "closes" => "18:00"
        ]
    ],
    "isAccessibleForFree" => false,
    "publicAccess" => true
];
@endphp
{!! json_encode($attractionSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

    <script type="application/ld+json">
@php
$websiteSchema = [
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "@id" => "https://villaveh.com/#website",
    "url" => "https://villaveh.com",
    "name" => "Villa Veh - Luxury Safari Accommodation",
    "description" => "Book luxury accommodation with game view at Lake Nakuru National Park. Experience the big five in comfort.",
    "potentialAction" => [
        "@type" => "SearchAction",
        "target" => [
            "@type" => "EntryPoint",
            "urlTemplate" => "https://villaveh.com/search?q={search_term_string}"
        ],
        "query-input" => "required name=search_term_string"
    ]
];
@endphp
{!! json_encode($websiteSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

    <script type="application/ld+json">
@php
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "@id" => "https://villaveh.com/#breadcrumb",
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
            "name" => "Luxury Accommodation",
            "item" => "https://villaveh.com"
        ]
    ]
];
@endphp
{!! json_encode($breadcrumbSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

    <script type="application/ld+json">
@php
$localBusinessSchema = [
    "@context" => "https://schema.org",
    "@type" => "LocalBusiness",
    "@id" => "https://villaveh.com/#localbusiness",
    "name" => "Villa Veh",
    "parentOrganization" => [
        "@type" => "Hotel",
        "@id" => "https://villaveh.com/#hotel"
    ],
    "openingHoursSpecification" => [
        [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            "opens" => "00:00",
            "closes" => "23:59"
        ]
    ],
    "currenciesAccepted" => "KES, USD",
    "paymentAccepted" => "Cash, Credit Card, Mobile Money, Bank Transfer",
    "priceRange" => "$$$",
    "areaServed" => [
        ["@type" => "City", "name" => "Nakuru"],
        ["@type" => "City", "name" => "Naivasha"],
        ["@type" => "City", "name" => "Nairobi"],
        ["@type" => "City", "name" => "Eldoret"],
        ["@type" => "City", "name" => "Kisumu"]
    ]
];
@endphp
{!! json_encode($localBusinessSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

{{-- Breadcrumbs (for UI) --}}
@section('breadcrumbs')
    <nav aria-label="Breadcrumb" class="text-sm hidden">
        <ol class="list-reset flex text-gray-600">
            <li class="flex items-center">
                <a href="{{ url('/') }}" class="hover:text-emerald-600">Home</a>
                <span class="mx-2">/</span>
            </li>
            <li>
                <span class="text-gray-500">Luxury Accommodation</span>
            </li>
        </ol>
    </nav>
@endsection

{{-- Main Content --}}
@section('content')
    @include('home')


@endsection
    @push('scripts')
        <script>
    function countdownTimer(targetDate) {
        return {
            days: 0,
            hours: 0,
            minutes: 0,
            seconds: 0,
            target: new Date(targetDate).getTime(),
            timer: null,

            startTimer() {
                this.update();
                this.timer = setInterval(() => this.update(), 1000);
            },

            update() {
                const now = new Date().getTime();
                const distance = this.target - now;

                if (distance < 0) {
                    clearInterval(this.timer);
                    this.days = 0;
                    this.hours = 0;
                    this.minutes = 0;
                    this.seconds = 0;
                    return;
                }

                this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
            }
        };
    }
</script>
    @endpush