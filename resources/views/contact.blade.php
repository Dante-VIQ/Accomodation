@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-amber-50 to-stone-50 text-stone-800 py-20 md:py-28"  style="background-image: url('{{ asset('/images/75.JPG') }}'); background-blend-mode: overlay; height: 70vh; width: 100%;">
  <div class="hero-overlay absolute inset-0 bg-black/40"></div>
        <div class="container mx-auto px-6 md:px-12 text-center">
            <span class="text-gray-300 font-semibold tracking-widest text-sm uppercase">— Connect With Us —</span>
            <h1 class=" text-gray-300 serif-heading text-4xl md:text-5xl font-semibold mt-3 mb-4">Contact Villaveh</h1>
            <div class="w-24 h-0.5 bg-amber-600 mx-auto mb-6"></div>
            <p class="text-xl max-w-3xl mx-auto text-gray-300">We're here to assist you with any inquiries about your stay or to create a personalized experience at Villaveh Gameview</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 md:px-12 py-10 md:py-28">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <span class="text-amber-700 font-semibold tracking-widest text-sm uppercase">— Direct Communication —</span>
                <h2 class="serif-heading text-3xl md:text-4xl font-semibold mt-3 mb-2 text-stone-800">Get In Touch</h2>
                <p class="text-stone-600 mb-8">Have questions about our accommodations, amenities, or special offers? Fill
                    out the form below and our team will get back to you within 24 hours.</p>

                <!-- Success Message (displayed after form submission) -->
                @if (session('success'))
                    <div id="form-success" class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-sm border border-emerald-200">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-emerald-600 text-xl mr-3 mt-0.5"></i>
                            <div>
                                <p class="font-semibold text-emerald-800">Message Sent Successfully!</p>
                                <p class="text-emerald-700 text-sm mt-1">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-sm border border-red-200">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-600 text-xl mr-3 mt-0.5"></i>
                            <div>
                                <p class="font-semibold text-red-800">Please fix the following errors:</p>
                                <ul class="list-disc list-inside mt-2 text-sm space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" enctype="multipart/form-data" method="POST"
                    class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-stone-700 font-medium mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full px-4 py-3 border border-stone-300 rounded-sm bg-stone-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"
                                required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-stone-700 font-medium mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-stone-300 rounded-sm bg-stone-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-stone-700 font-medium mb-2">Email Address *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-stone-300 rounded-sm bg-stone-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"
                            required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subject" class="block text-stone-700 font-medium mb-2">Subject *</label>
                        <select id="subject" name="subject"
                            class="w-full px-4 py-3 border rounded-sm bg-stone-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition {{ $errors->has('subject') ? 'border-red-300' : 'border-stone-300' }}"
                            required>
                            <option value="">Select a subject</option>
                            <option value="Reservation Inquiry"
                                {{ old('subject') == 'Reservation Inquiry' ? 'selected' : '' }}>Reservation Inquiry
                            </option>
                            <option value="Hotel Amenities"
                                {{ old('subject') == 'Hotel Amenities' ? 'selected' : '' }}>Hotel Amenities</option>
                            <option value="Events & Meetings"
                                {{ old('subject') == 'Events & Meetings' ? 'selected' : '' }}>Events & Meetings
                            </option>
                            <option value="Special Offers" {{ old('subject') == 'Special Offers' ? 'selected' : '' }}>
                                Special Offers</option>
                            <option value="Feedback" {{ old('subject') == 'Feedback' ? 'selected' : '' }}>Feedback
                            </option>
                            <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-stone-700 font-medium mb-2">Message *</label>
                        <textarea id="message" name="message" rows="5"
                            class="w-full px-4 py-3 border border-stone-300 rounded-sm bg-stone-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition"
                            required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Honeypot field for spam prevention -->
                    <div class="hidden">
                        <label for="honeypot">Leave this field empty</label>
                        <input type="text" id="honeypot" name="honeypot" value="">
                    </div>

                    <!-- Google reCAPTCHA (optional) -->
                    {{-- @if (config('services.google.recaptcha_site_key'))
                        <div class="mb-4">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.google.recaptcha_site_key') }}">
                            </div>
                            @error('g-recaptcha-response')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif --}}

                    <button type="submit"
                        class="w-full bg-amber-800 hover:bg-amber-900 text-white py-4 px-6 rounded-sm font-semibold tracking-wide transition duration-300 transform hover:-translate-y-0.5 active:translate-y-0 shadow-md hover:shadow-lg text-lg"
                        id="submit-btn">
                        <i class="fas fa-paper-plane mr-2"></i>
                        <span id="submit-text">Send Message</span>
                        <span id="loading-spinner" class="hidden">
                            <i class="fas fa-spinner fa-spin mr-2"></i>Sending...
                        </span>
                    </button>
                </form>


                <div class="bg-stone-800 text-white rounded-sm p-8 shadow-lg mt-12">
                    <h3 class="serif-heading text-2xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-phone-alt text-amber-400 mr-3"></i>Instant Concierge
                    </h3>
                    <p class="mb-6 text-stone-200">For urgent matters or same-day reservations, please call our concierge team directly.
                    </p>
                    <div class="flex items-center bg-amber-700/20 p-6 rounded-sm border border-amber-600/30">
                        <i class="fas fa-phone-volume text-amber-400 text-3xl mr-4"></i>
                        <div>
                            <p class="text-sm opacity-80 text-amber-100">Call us now</p>
                            <span class="text-3xl font-bold text-amber-300">+254 110474109</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information & Map -->
            <div>
                <section class="">
                    <div class="flex flex-col">
                        <!-- Section Header -->


                        <div class="flex flex-col gap-8 items-stretch">

                            <div class="text-center mb-12">
                                <span class="text-amber-700 font-semibold tracking-widest text-sm uppercase">— Our Location —</span>
                                <h2 class="serif-heading text-3xl md:text-4xl font-semibold mt-3 text-stone-800">Visit Villaveh Gameview</h2>
                            </div>
                            <!-- Map Container -->
                            <div class="rounded-sm overflow-hidden shadow-2xl h-[500px] mb-8">
                                <div id="hotel-map"
                                    class="w-full h-full bg-gradient-to-br from-stone-200 to-stone-300">
                                    <!-- Map will be loaded here -->
                                </div>
                            </div>

                            <!-- Location Info & Directions -->
                            <div class="bg-white rounded-sm p-8 shadow-xl border border-stone-200">
                                <div class="mb-8">
                                    <h4 class="text-2xl font-semibold text-stone-800 mb-4">Hotel Location</h4>
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <svg class="w-6 h-6 text-amber-700 mr-4 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <div>
                                                <p class="font-semibold text-stone-800">Address</p>
                                                <p class="text-stone-600">Free Area, Nakuru City, Kenya</p>
                                                <div class="mt-2">
                                                    <span
                                                        class="inline-block bg-amber-50 text-amber-800 text-xs px-3 py-1 rounded-sm font-mono border border-amber-200">
                                                        Plus Code: M4PJ+XRG Nakuru
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-6 h-6 text-amber-700 mr-4 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <div>
                                                <p class="font-semibold text-stone-800">24/7 Concierge</p>
                                                <p class="text-stone-600">Available for assistance anytime</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-6 h-6 text-amber-700 mr-4 mt-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            <div>
                                                <p class="font-semibold text-stone-800">Transportation</p>
                                                <p class="text-stone-600">Valet parking & limousine service available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick Directions -->
                                <div class="mb-8 pt-8 border-t border-stone-200">
                                    <h4 class="text-lg font-semibold text-stone-800 mb-4">Get Directions</h4>
                                    <div class="space-y-4">
                                        <input type="text" id="start-address"
                                            placeholder="Enter your starting address"
                                            class="w-full px-4 py-3 border border-stone-300 rounded-sm bg-stone-50 focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                        <button onclick="openDirections()"
                                            class="w-full bg-amber-800 hover:bg-amber-900 text-white py-3 px-6 rounded-sm font-medium transition duration-300 flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                            </svg>
                                            Get Turn-by-Turn Directions
                                        </button>
                                    </div>
                                </div>

                                <!-- Map App Buttons -->
                                <div class="space-y-3">
                                    <h5 class="text-lg font-semibold text-stone-800 mb-3">Open in Map App</h5>
                                    <div class="grid grid-cols-2 gap-3">
                                        <button onclick="openGoogleMapsWithPlusCode()"
                                            class="bg-white border border-stone-300 text-stone-700 py-3 px-4 rounded-sm font-medium hover:bg-stone-50 transition duration-300 flex items-center justify-center gap-2 text-sm">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                                <path fill="#4285F4"
                                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                                <path fill="#34A853"
                                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                                <path fill="#FBBC05"
                                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                                <path fill="#EA4335"
                                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                            </svg>
                                            Google Maps
                                        </button>
                                        <button onclick="openAppleMapsWithPlusCode()"
                                            class="bg-stone-900 text-white py-3 px-4 rounded-sm font-medium hover:bg-stone-800 transition duration-300 flex items-center justify-center gap-2 text-sm">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z" />
                                                <path
                                                    d="M16.5 8.5c0 .828-.672 1.5-1.5 1.5s-1.5-.672-1.5-1.5S14.172 7 15 7s1.5.672 1.5 1.5zM12 13c-2.763 0-5 2.237-5 5v1h2v-1c0-1.654 1.346-3 3-3s3 1.346 3 3v1h2v-1c0-2.763-2.237-5-5-5z" />
                                            </svg>
                                            Apple Maps
                                        </button>
                                        <button onclick="openWazeWithPlusCode()"
                                            class="bg-[#33CCFF] text-white py-3 px-4 rounded-sm font-medium hover:bg-[#29b3e5] transition duration-300 flex items-center justify-center gap-2 text-sm">
                                            <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22.5C6.201 22.5 1.5 17.799 1.5 12S6.201 1.5 12 1.5 22.5 6.201 22.5 12 17.799 22.5 12 22.5z" />
                                                <path
                                                    d="M12 6a6 6 0 100 12 6 6 0 000-12zm0 10.5a4.5 4.5 0 110-9 4.5 4.5 0 010 9z" />
                                                <path
                                                    d="M12 9a3 3 0 100 6 3 3 0 000-6zm0 4.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                                            </svg>
                                            Waze
                                        </button>
                                        <button onclick="openOpenStreetMapWithPlusCode()"
                                            class="bg-[#7EBC6F] text-white py-3 px-4 rounded-sm font-medium hover:bg-[#6CA85E] transition duration-300 flex items-center justify-center gap-2 text-sm">
                                            <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z" />
                                                <path
                                                    d="M12 6a6 6 0 100 12 6 6 0 000-12zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" />
                                                <circle cx="12" cy="12" r="2" />
                                            </svg>
                                            OpenStreetMap
                                        </button>
                                    </div>

                                    <!-- Plus Code Display -->
                                    <div class="mt-6 pt-6 border-t border-stone-200">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-semibold text-stone-800">Location Plus Code</p>
                                                <p class="text-lg font-mono text-stone-900 mt-2 font-bold">M4PJ+XRG Nakuru</p>
                                            </div>
                                            <button onclick="copyPlusCode()"
                                                class="text-amber-700 hover:text-amber-800 transition flex items-center gap-2 font-medium">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                                Copy
                                            </button>
                                        </div>
                                        <p class="text-xs text-stone-500 mt-2">Share this Plus Code for precise navigation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Additional Info -->

            </div>
        </div>
    </main>
@endsection

