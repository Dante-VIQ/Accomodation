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
    </script>
<style>
    .hotel-marker {
        background: none !important;
        border: none !important;
    }
    
    #hotel-map iframe {
        filter: grayscale(20%) contrast(110%);
        transition: filter 0.3s ease;
    }
    
    #hotel-map iframe:hover {
        filter: grayscale(0%) contrast(100%);
    }
    
    /* Leaflet map container styles */
    #hotel-map .leaflet-container {
        background: linear-gradient(135deg, #f8f4e9 0%, #e8e4d9 100%);
    }

      /* Plus Code specific styles */
    .plus-code-badge {
        font-family: 'Monaco', 'Consolas', 'Courier New', monospace;
        letter-spacing: 0.05em;
    }
    
    #hotel-map iframe {
        filter: grayscale(20%) contrast(110%);
        transition: filter 0.3s ease;
    }
    
    #hotel-map iframe:hover {
        filter: grayscale(0%) contrast(100%);
    }
    
    /* Animation for copied feedback */
    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateY(-10px); }
        10% { opacity: 1; transform: translateY(0); }
        90% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(10px); }
    }
    
    .copy-feedback {
        animation: fadeInOut 2s ease;
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
    // Hotel location using Plus Code
    const hotelLocation = {
        plusCode: "M4PJ+XRG Nakuru", // Your Plus Code
        displayPlusCode: "M4PJ+XRG Nakuru, Kenya",
        address: "Free Area, Nakuru City, Kenya",
        name: "Serenity Heights Hotel",
        // Optional: Convert Plus Code to coordinates for maps that need lat/lng
        // You can get these from https://plus.codes/ or Google Maps
        lat: -0.303099, // Approximate coordinates for M4PJ+XRG Nakuru
        lng: 36.080000   // Approximate coordinates for M4PJ+XRG Nakuru
    };

    // Convert Plus Code to coordinates for mapping
    function convertPlusCodeToCoordinates(plusCode) {
        // For M4PJ+XRG format, we can use the Open Location Code library
        // Or use a simple conversion if you know the approximate coordinates
        return {
            lat: hotelLocation.lat,
            lng: hotelLocation.lng
        };
    }

    // Initialize OpenStreetMap using Plus Code
    function initOpenStreetMapWithPlusCode() {
        const mapElement = document.getElementById('hotel-map');
        if (!mapElement) return;

        const coords = convertPlusCodeToCoordinates(hotelLocation.plusCode);
        
        // OpenStreetMap iframe centered on coordinates
        const mapUrl = `https://www.openstreetmap.org/export/embed.html?bbox=${coords.lng - 0.01}%2C${coords.lat - 0.01}%2C${coords.lng + 0.01}%2C${coords.lat + 0.01}&layer=mapnik&marker=${coords.lat}%2C${coords.lng}`;
        
        mapElement.innerHTML = `
            <iframe 
                class="w-full h-full border-0"
                src="${mapUrl}"
                title="Hotel Location Map"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm rounded-lg p-3 shadow-lg">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-hotel-gold" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/>
                        <circle cx="12" cy="12" r="4"/>
                    </svg>
                    <div>
                        <p class="text-xs text-gray-600">Plus Code:</p>
                        <p class="text-sm font-mono text-hotel-navy">${hotelLocation.plusCode}</p>
                    </div>
                </div>
                <a href="https://www.openstreetmap.org/?mlat=${coords.lat}&mlon=${coords.lng}#map=17/${coords.lat}/${coords.lng}" 
                   target="_blank" 
                   class="mt-2 block text-xs text-hotel-gold hover:text-yellow-600 transition flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                    </svg>
                    View Larger Map
                </a>
            </div>
        `;
    }

    // Open directions in Google Maps using Plus Code
    function openDirections() {
        const startAddress = document.getElementById('start-address').value;
        
        if (startAddress) {
            // With starting address and Plus Code destination
            const encodedStart = encodeURIComponent(startAddress);
            const encodedPlusCode = encodeURIComponent(hotelLocation.plusCode);
            window.open(`https://www.google.com/maps/dir/${encodedStart}/${encodedPlusCode}`, '_blank');
        } else {
            // Just Plus Code destination
            openGoogleMapsWithPlusCode();
        }
    }

    // Open Google Maps with Plus Code
    function openGoogleMapsWithPlusCode() {
        // Google Maps directly supports Plus Codes!
        const encodedPlusCode = encodeURIComponent(hotelLocation.plusCode);
        window.open(`https://www.google.com/maps/search/?api=1&query=${encodedPlusCode}`, '_blank');
    }

    // Open Apple Maps (may need coordinates, so we convert Plus Code)
    function openAppleMapsWithPlusCode() {
        const coords = convertPlusCodeToCoordinates(hotelLocation.plusCode);
        const encodedName = encodeURIComponent(hotelLocation.name);
        window.open(`http://maps.apple.com/?ll=${coords.lat},${coords.lng}&q=${encodedName}`, '_blank');
    }

    // Open Waze with coordinates (converted from Plus Code)
    function openWazeWithPlusCode() {
        const coords = convertPlusCodeToCoordinates(hotelLocation.plusCode);
        window.open(`https://www.waze.com/ul?ll=${coords.lat},${coords.lng}&navigate=yes`, '_blank');
    }

    // Open OpenStreetMap with coordinates
    function openOpenStreetMapWithPlusCode() {
        const coords = convertPlusCodeToCoordinates(hotelLocation.plusCode);
        window.open(`https://www.openstreetmap.org/?mlat=${coords.lat}&mlon=${coords.lng}#map=17/${coords.lat}/${coords.lng}`, '_blank');
    }

    // Copy Plus Code to clipboard
    function copyPlusCode() {
        navigator.clipboard.writeText(hotelLocation.plusCode).then(() => {
            // Show success feedback
            const button = event.target.closest('button');
            const originalHTML = button.innerHTML;
            button.innerHTML = `
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Copied!
            `;
            button.classList.remove('text-hotel-gold');
            button.classList.add('text-green-600');
            
            setTimeout(() => {
                button.innerHTML = originalHTML;
                button.classList.remove('text-green-600');
                button.classList.add('text-hotel-gold');
            }, 2000);
        });
    }

    // Show Plus Code in a QR code for easy mobile sharing
    function showPlusCodeQR() {
        // Optional: Generate QR code for the Plus Code
        const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(`https://plus.codes/${hotelLocation.plusCode.replace('+', '').replace(' ', '')}`)}`;
        
        // Create modal or show QR code
        const qrModal = document.createElement('div');
        qrModal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50';
        qrModal.innerHTML = `
            <div class="bg-white rounded-2xl p-6 max-w-sm mx-4">
                <div class="text-center">
                    <h3 class="text-lg font-medium text-hotel-navy mb-4">Scan to Navigate</h3>
                    <img src="${qrCodeUrl}" alt="Plus Code QR Code" class="mx-auto mb-4">
                    <p class="text-sm text-gray-600 mb-2">Scan this QR code with your phone's camera</p>
                    <p class="font-mono text-hotel-gold mb-4">${hotelLocation.plusCode}</p>
                    <button onclick="this.closest('.fixed').remove()" 
                            class="mt-2 text-hotel-gold hover:text-yellow-600">
                        Close
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(qrModal);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize map using Plus Code
        initOpenStreetMapWithPlusCode();
        
        // Add QR code button if desired
        const plusCodeSection = document.querySelector('.mt-6.pt-6.border-t');
        if (plusCodeSection) {
            const qrButton = document.createElement('button');
            qrButton.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                </svg>
                QR Code
            `;
            qrButton.className = 'text-hotel-gold hover:text-yellow-600 transition flex items-center gap-2 ml-4';
            qrButton.onclick = showPlusCodeQR;
            plusCodeSection.querySelector('.flex').appendChild(qrButton);
        }

        // Auto-fill current location in directions field
        if (navigator.geolocation) {
            const locationInput = document.getElementById('start-address');
            locationInput.addEventListener('click', function() {
                if (!this.dataset.autoFilled) {
                    this.placeholder = 'Detecting your location...';
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const { latitude, longitude } = position.coords;
                            // Use Plus Code API to get address from coordinates
                            fetch(`https://plus.codes/api?address=${latitude},${longitude}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.plus_code && data.plus_code.global_code) {
                                        this.value = data.plus_code.global_code;
                                        this.dataset.autoFilled = 'true';
                                    }
                                    this.placeholder = 'Enter your starting address';
                                })
                                .catch(() => {
                                    this.placeholder = 'Enter your starting address';
                                });
                        },
                        () => {
                            this.placeholder = 'Enter your starting address';
                        }
                    );
                }
            });
        }
    });

    // Plus Code validation and formatting
    function formatPlusCode(plusCode) {
        // Format Plus Code for display: M4PJ+XRG Nakuru
        const parts = plusCode.split(' ');
        const code = parts[0];
        const location = parts.slice(1).join(' ');
        
        if (code.includes('+')) {
            return `<span class="font-mono">${code}</span> ${location ? `<span class="text-gray-600">${location}</span>` : ''}`;
        }
        return plusCode;
    }
</script>

<style>
    /* Plus Code specific styles */
    .plus-code-badge {
        font-family: 'Monaco', 'Consolas', 'Courier New', monospace;
        letter-spacing: 0.05em;
    }
    
    #hotel-map iframe {
        filter: grayscale(20%) contrast(110%);
        transition: filter 0.3s ease;
    }
    
    #hotel-map iframe:hover {
        filter: grayscale(0%) contrast(100%);
    }
    
    /* Animation for copied feedback */
    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateY(-10px); }
        10% { opacity: 1; transform: translateY(0); }
        90% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(10px); }
    }
    
    .copy-feedback {
        animation: fadeInOut 2s ease;
    }
</style>

    <!-- Optional: Add some custom styles -->

    {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contact-form');
        const submitBtn = document.getElementById('submit-btn');
        const submitText = document.getElementById('submit-text');
        const loadingSpinner = document.getElementById('loading-spinner');

        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                // Basic client-side validation
                const honeypot = document.querySelector('input[name="honeypot"]');

                // Check if honeypot exists and has value
                if (honeypot && honeypot.value !== '') {
                    e.preventDefault();
                    alert('Spam detected!');
                    return;
                }

                // Show loading state
                if (submitText && loadingSpinner && submitBtn) {
                    submitText.classList.add('hidden');
                    loadingSpinner.classList.remove('hidden');
                    submitBtn.disabled = true;
                }

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
</script>> --}}

    <!-- Google reCAPTCHA script -->
    {{-- @if (config('services.google.recaptcha_site_key'))
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif --}}
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
