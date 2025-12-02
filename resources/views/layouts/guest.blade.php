<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VillaVeh') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- Use your own Google Maps API key - Get one at: https://console.cloud.google.com/google/maps-apis -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&callback=initMap&loading=async&libraries=marker"
        async defer></script>
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

        // Map initialization function
        async function initMap() {
            try {
                // Request needed libraries
                const {
                    Map
                } = await google.maps.importLibrary("maps");
                const {
                    AdvancedMarkerElement
                } = await google.maps.importLibrary("marker");

                // Hotel coordinates - using a luxury hotel location in New York as an example
                const hotelLocation = {
                    lat: 40.7580,
                    lng: -73.9855
                };

                // Create map centered on hotel
                const map = new Map(document.getElementById("hotel-map"), {
                    zoom: 16,
                    center: hotelLocation,
                    mapId: 'hotel_map_id',
                    disableDefaultUI: false,
                    zoomControl: true,
                    mapTypeControl: false,
                    scaleControl: true,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: true,
                    styles: [{
                            "featureType": "all",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                    "color": "#7c93a3"
                                },
                                {
                                    "lightness": "-10"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.country",
                            "elementType": "geometry",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "administrative.province",
                            "elementType": "geometry",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry.fill",
                            "stylers": [{
                                "color": "#f5f5f2"
                            }]
                        },
                        {
                            "featureType": "landscape.man_made",
                            "elementType": "geometry.fill",
                            "stylers": [{
                                "color": "#ffffff"
                            }]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [{
                                    "saturation": "-100"
                                },
                                {
                                    "lightness": "45"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "simplified"
                            }]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [{
                                    "color": "#46bcec"
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ]
                });

                // Create custom marker content
                const markerContent = document.createElement('div');
                markerContent.className = 'hotel-marker';
                markerContent.innerHTML = `
                    <div style="
                        position: relative;
                        background: #D4AF37;
                        border: 3px solid white;
                        border-radius: 50%;
                        width: 48px;
                        height: 48px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0 2px 6px rgba(0,0,0,0.3);
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">
                        <i class="fas fa-hotel" style="color: white; font-size: 20px;"></i>
                        <div style="
                            position: absolute;
                            bottom: -10px;
                            left: 50%;
                            transform: translateX(-50%);
                            width: 0;
                            height: 0;
                            border-left: 10px solid transparent;
                            border-right: 10px solid transparent;
                            border-top: 10px solid #D4AF37;
                        "></div>
                    </div>
                `;

                // Add hotel marker using AdvancedMarkerElement
                const marker = new AdvancedMarkerElement({
                    map,
                    position: hotelLocation,
                    title: "Serenity Heights Hotel",
                    content: markerContent
                });

                // Info window for the marker
                const infoWindow = new google.maps.InfoWindow({
                    content: `
                        <div style="padding: 15px; max-width: 250px;">
                            <h3 style="color: #1E3A5F; font-weight: bold; margin-bottom: 5px; font-size: 16px;">Serenity Heights Hotel</h3>
                            <p style="color: #555; margin-bottom: 8px; font-size: 14px;">123 Luxury Avenue, Resort City</p>
                            <p style="color: #555; margin-bottom: 10px; font-size: 14px;">⭐⭐⭐⭐⭐ Luxury Accommodation</p>
                            <a href="#directions" style="color: #D4AF37; text-decoration: none; font-weight: 500; font-size: 14px;">
                                Get Directions →
                            </a>
                        </div>
                    `
                });

                // Open info window when marker is clicked
                markerContent.addEventListener('click', () => {
                    infoWindow.open({
                        anchor: marker,
                        map,
                    });
                });

                // Add center control
                const centerControlDiv = document.createElement("div");
                centerControlDiv.style.margin = "10px";

                const centerButton = document.createElement("button");
                centerButton.textContent = "Center on Hotel";
                centerButton.style.cssText = `
                    background-color: #1E3A5F;
                    border: 2px solid #fff;
                    border-radius: 3px;
                    box-shadow: 0 2px 6px rgba(0,0,0,.3);
                    color: #FFFFFF;
                    cursor: pointer;
                    font-family: 'Inter', sans-serif;
                    font-size: 14px;
                    line-height: 38px;
                    margin: 8px 10px 22px;
                    padding: 0 10px;
                    text-align: center;
                `;

                centerButton.addEventListener("click", () => {
                    map.setCenter(hotelLocation);
                    map.setZoom(16);
                });

                centerControlDiv.appendChild(centerButton);
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(centerControlDiv);

                // Initialize directions functionality
                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer();
                directionsRenderer.setMap(map);

                // Initialize directions panel
                const directionsPanel = document.getElementById("directions-panel");
                if (directionsPanel) {
                    directionsRenderer.setPanel(directionsPanel);
                }

                // Add event listener for directions form
                document.getElementById("get-directions-btn")?.addEventListener("click", function() {
                    calculateAndDisplayRoute(directionsService, directionsRenderer);
                });

                // Add map loaded indicator
                document.getElementById('hotel-map').classList.add('map-loaded');

            } catch (error) {
                console.error('Error loading map:', error);
                showMapFallback();
            }
        }

        // Function to calculate and display route
        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
            const start = document.getElementById("start-location").value;
            const end = "123 Luxury Avenue, Resort City, NY 10001";

            if (!start) {
                alert("Please enter your starting location");
                return;
            }

            directionsService.route({
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(response);
                        document.getElementById("directions-section").classList.remove("hidden");
                        // Scroll to directions
                        document.getElementById("directions-section").scrollIntoView({
                            behavior: 'smooth'
                        });
                    } else {
                        alert("Could not get directions: " + status);
                    }
                }
            );
        }

        // Show fallback if map fails to load
        function showMapFallback() {
            const mapElement = document.getElementById('hotel-map');
            if (mapElement) {
                mapElement.innerHTML = `
                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-r from-hotel-navy to-hotel-brown">
                        <div class="text-center text-white p-6">
                            <i class="fas fa-map-marked-alt text-5xl mb-4"></i>
                            <p class="text-xl font-medium mb-2">Interactive Map</p>
                            <p class="mb-4">123 Free Area, Lanet, Nakuru City</p>
                            <div class="space-y-3 text-left max-w-xs mx-auto">
                                <div class="flex items-start">
                                    <i class="fas fa-map-marker-alt text-hotel-gold mt-1 mr-3"></i>
                                    <div>
                                        <p class="font-medium">Address</p>
                                        <p class="text-sm">Free Area, Nakuru City</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-car text-hotel-gold mt-1 mr-3"></i>
                                    <div>
                                        <p class="font-medium">Parking</p>
                                        <p class="text-sm">Valet parking available 24/7</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="initMap()" class="mt-6 bg-hotel-gold text-white py-2 px-6 rounded-lg font-medium hover:bg-yellow-600 transition">
                                Reload Map
                            </button>
                        </div>
                    </div>
                `;
            }
        }

        // Initialize when page loads
        window.addEventListener('DOMContentLoaded', (event) => {
            // If map fails to load, show fallback after timeout
            setTimeout(() => {
                const mapElement = document.getElementById('hotel-map');
                if (mapElement && !mapElement.classList.contains('map-loaded')) {
                    showMapFallback();
                }
            }, 5000);

            // Form submission handler
            document.getElementById('contact-form')?.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form values
                const firstName = document.getElementById('firstName').value;
                const email = document.getElementById('email').value;

                // Show success message
                const successMsg = document.getElementById('form-success');
                successMsg.classList.remove('hidden');
                successMsg.innerHTML = `
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 text-xl mr-3 mt-0.5"></i>
                        <div>
                            <p class="font-medium text-green-800">Message Sent Successfully!</p>
                            <p class="text-green-700">Thank you ${firstName}! We've received your message and will respond to ${email} within 24 hours.</p>
                        </div>
                    </div>
                `;

                // Scroll to success message
                successMsg.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                // Reset form after 5 seconds
                setTimeout(() => {
                    this.reset();
                    setTimeout(() => {
                        successMsg.classList.add('hidden');
                    }, 300);
                }, 5000);
            });

            // Add sample locations for directions
            const locationInput = document.getElementById('start-location');
            if (locationInput) {
                locationInput.addEventListener('focus', function() {
                    if (!this.value) {
                        this.value = 'New York';
                    }
                });

                locationInput.addEventListener('blur', function() {
                    if (this.value === 'New York') {
                        this.value = '';
                    }
                });
            }
        });
    </script>
    <style>
        #hotel-map {
            height: 100%;
            width: 100%;
            min-height: 320px;
        }

        .gm-style .gm-style-iw-c {
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .gm-style-iw-d {
            overflow: hidden !important;
        }

        .directions-panel {
            max-height: 300px;
            overflow-y: auto;
        }

        .hotel-marker:hover {
            transform: scale(1.1);
            z-index: 1000;
        }

        /* Custom scrollbar for directions */
        .directions-panel::-webkit-scrollbar {
            width: 8px;
        }

        .directions-panel::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .directions-panel::-webkit-scrollbar-thumb {
            background: #D4AF37;
            border-radius: 4px;
        }

        .directions-panel::-webkit-scrollbar-thumb:hover {
            background: #b8941f;
        }

        /* Loading animation for map */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .map-loading {
            animation: pulse 2s infinite;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="bg-hotel-cream font-sans text-gray-900">
    @include('layouts.navigation')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            {{ $slot }}
        </div>


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

        <script>
        // Form submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const loadingSpinner = document.getElementById('loading-spinner');
            
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    // Basic client-side validation
                    const honeypot = document.getElementById('honeypot').value;
                    if (honeypot !== '') {
                        e.preventDefault();
                        alert('Spam detected!');
                        return;
                    }
                    
                    // Show loading state
                    submitText.classList.add('hidden');
                    loadingSpinner.classList.remove('hidden');
                    submitBtn.disabled = true;
                    
                    // The form will submit normally to Laravel
                });
            }
            
            // Auto-hide success/error messages after 10 seconds
            setTimeout(() => {
                const successMsg = document.getElementById('form-success');
                const errorMsg = document.querySelector('.bg-red-50');
                
                if (successMsg) {
                    successMsg.style.opacity = '0';
                    successMsg.style.transition = 'opacity 0.5s';
                    setTimeout(() => successMsg.remove(), 500);
                }
                
                if (errorMsg) {
                    errorMsg.style.opacity = '0';
                    errorMsg.style.transition = 'opacity 0.5s';
                    setTimeout(() => errorMsg.remove(), 500);
                }
            }, 10000);
        });
    </script>
    
    <!-- Google reCAPTCHA script -->
    @if(config('services.google.recaptcha_site_key'))
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    {{-- <script>
        // Simple mobile nav toggle
        document.addEventListener('DOMContentLoaded', function() {
            const navToggle = document.getElementById('nav-toggle');
            const navMenu = document.getElementById('nav-menu');
            if (navToggle && navMenu) {
                navToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('hidden');
                });
            }
        });
    </script> --}}

    @livewireScripts

</body>

</html>
