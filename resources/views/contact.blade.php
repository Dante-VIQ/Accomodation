<x-guest-layout>
<!-- Hero Section -->
    <section class="relative max-w-5xl bg-hotel-navy text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="font-serif text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl max-w-2xl mx-auto">We're here to assist you with any inquiries about your stay at VillaVeh GameView</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="font-serif text-3xl font-semibold text-hotel-navy mb-6">Get In Touch</h2>
                <p class="text-gray-600 mb-8">Have questions about our accommodations, amenities, or special offers? Fill out the form below and our team will get back to you within 24 hours.</p>

                <form id="contact-form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-gray-700 mb-2">First Name *</label>
                            <input type="text" id="firstName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition" required>
                        </div>
                        <div>
                            <label for="lastName" class="block text-gray-700 mb-2">Last Name *</label>
                            <input type="text" id="lastName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition" required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email Address *</label>
                        <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition">
                    </div>

                    <div>
                        <label for="subject" class="block text-gray-700 mb-2">Subject</label>
                        <select id="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition">
                            <option value="">Select a subject</option>
                            <option value="reservation">Reservation Inquiry</option>
                            <option value="amenities">Hotel Amenities</option>
                            <option value="events">Events & Meetings</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-gray-700 mb-2">Message *</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition" required></textarea>
                    </div>

                    <div id="form-success" class="hidden p-4 bg-green-50 text-green-700 rounded-lg border border-green-200 transition-all duration-300">
                        <!-- Success message will appear here -->
                    </div>

                    <button type="submit" class="w-full bg-hotel-gold text-white py-3 px-6 rounded-lg font-medium hover:bg-yellow-600 transition duration-300 transform hover:-translate-y-0.5 active:translate-y-0 shadow-md hover:shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information & Map -->
            <div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                    <div class="p-6">
                        <h3 class="font-serif text-2xl font-semibold text-hotel-navy mb-6">Our Location</h3>

                        <!-- Map Container -->
                        <div class="h-80 bg-gray-200 rounded-lg overflow-hidden mb-6 relative map-loading">
                            <div id="hotel-map" class="absolute inset-0"></div>
                        </div>

                        <!-- Directions Section -->
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <h4 class="font-semibold text-hotel-navy mb-3 flex items-center">
                                <i class="fas fa-route text-hotel-gold mr-2"></i>Get Directions to the Hotel
                            </h4>
                            <div class="flex flex-col sm:flex-row gap-2">
                                <div class="relative flex-grow">
                                    <i class="fas fa-map-marker-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" id="start-location" placeholder="Enter your location" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-hotel-gold focus:border-transparent transition">
                                </div>
                                <button id="get-directions-btn" class="bg-hotel-navy text-white py-2 px-4 rounded-lg hover:bg-blue-900 transition flex items-center justify-center">
                                    <i class="fas fa-directions mr-2"></i>Get Directions
                                </button>
                            </div>
                        </div>

                        <!-- Directions Panel (hidden by default) -->
                        <div id="directions-section" class="hidden mb-6">
                            <div class="flex justify-between items-center mb-3">
                                <h4 class="font-semibold text-hotel-navy flex items-center">
                                    <i class="fas fa-map-signs text-hotel-gold mr-2"></i>Directions to VillaVeh GameView
                                </h4>
                                <button onclick="document.getElementById('directions-section').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div id="directions-panel" class="directions-panel p-3 border border-gray-200 rounded-lg bg-gray-50"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-hotel-navy mb-4 flex items-center">
                                    <i class="fas fa-address-card text-hotel-gold mr-2"></i>Contact Details
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <i class="fas fa-map-marker-alt text-hotel-gold mt-1 mr-3"></i>
                                        <div>
                                            <p class="font-medium">Address</p>
                                            <p class="text-gray-600">Free Area, Lanet<br>Nakuru City, 20100</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-phone text-hotel-gold mt-1 mr-3"></i>
                                        <div>
                                            <p class="font-medium">Phone</p>
                                            <p class="text-gray-600">+254 110474109</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-envelope text-hotel-gold mt-1 mr-3"></i>
                                        <div>
                                            <p class="font-medium">Email</p>
                                            <p class="text-gray-600">admin@villaveh.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-semibold text-hotel-navy mb-4 flex items-center">
                                    <i class="fas fa-clock text-hotel-gold mr-2"></i>Hotel Hours
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-1 border-b border-gray-100">
                                        <span class="text-gray-600">Front Desk</span>
                                        <span class="font-medium bg-green-100 text-green-800 text-xs px-2 py-1 rounded">24/7</span>
                                    </div>
                                    <div class="flex justify-between py-1 border-b border-gray-100">
                                        <span class="text-gray-600">Check-in</span>
                                        <span class="font-medium">3:00 PM</span>
                                    </div>
                                    <div class="flex justify-between py-1 border-b border-gray-100">
                                        <span class="text-gray-600">Check-out</span>
                                        <span class="font-medium">11:00 AM</span>
                                    </div>
                                    <div class="flex justify-between py-1 border-b border-gray-100">
                                        <span class="text-gray-600">Restaurant</span>
                                        <span class="font-medium">7AM-10PM</span>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <span class="text-gray-600">Spa</span>
                                        <span class="font-medium">9AM-8PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="bg-hotel-navy text-white rounded-xl p-6 shadow-lg">
                    <h3 class="font-serif text-2xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-headset text-hotel-gold mr-3"></i>Need Immediate Assistance?
                    </h3>
                    <p class="mb-4">For urgent matters or same-day reservations, please call our front desk directly.</p>
                    <div class="flex items-center bg-hotel-brown/30 p-4 rounded-lg">
                        <i class="fas fa-phone-volume text-hotel-gold text-2xl mr-3"></i>
                        <div>
                            <p class="text-sm opacity-80">Call us now</p>
                            <span class="text-2xl font-bold">+254 110474109</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
