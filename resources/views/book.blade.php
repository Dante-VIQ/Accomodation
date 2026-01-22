<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Luxe Heritage Hotel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#D4AF37',
                        'gold-light': '#F4E8C1',
                        'luxe-blue': '#0A2463',
                        'luxe-teal': '#0F766E',
                        'luxe-gray': '#374151',
                        'cream': '#F8F5F0'
                    },
                    fontFamily: {
                        'playfair': ['Playfair Display', 'serif'],
                        'montserrat': ['Montserrat', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F8F5F0;
        }

        .luxury-border {
            border: 1px solid #D4AF37;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .hero-bg {
            background-image: linear-gradient(rgba(10, 36, 99, 0.85), rgba(10, 36, 99, 0.7)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }

        .room-card {
            transition: all 0.3s ease;
            border-top: 3px solid transparent;
        }

        .room-card:hover {
            transform: translateY(-5px);
            border-top-color: #D4AF37;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .room-card.selected {
            border-top-color: #D4AF37;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        input:focus,
        select:focus {
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .loading-spinner {
            display: none;
        }

        .loading .loading-spinner {
            display: inline-block;
        }

        .loading .submit-text {
            display: none;
        }

        .step-indicator.active {
            background-color: #D4AF37;
            color: white;
        }

        .step-indicator.completed {
            background-color: #0F766E;
            color: white;
        }
    </style>
</head>

<body class="text-luxe-gray">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-luxe-blue rounded-full flex items-center justify-center mr-3">
                    <span class="text-white font-bold text-lg">LH</span>
                </div>
                <h1 class="font-playfair text-2xl font-bold text-luxe-blue">Luxe Heritage Hotel</h1>
            </div>
            <nav>
                <ul class="flex space-x-8">
                    <li><a href="#" class="font-medium hover:text-gold transition">Home</a></li>
                    <li><a href="#" class="font-medium hover:text-gold transition">Rooms & Suites</a></li>
                    <li><a href="#" class="font-medium text-gold border-b-2 border-gold pb-1">Reservations</a>
                    </li>
                    <li><a href="#" class="font-medium hover:text-gold transition">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-bg text-white py-16">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="font-playfair text-5xl font-bold mb-6">Reserve Your Stay</h2>
                    <p class="text-xl mb-8 max-w-2xl mx-auto">Experience unparalleled luxury at Luxe Heritage Hotel.
                        Complete the form below to secure your reservation with us.</p>
                    <div class="flex justify-center space-x-4 mb-12">
                        <div
                            class="step-indicator active w-10 h-10 rounded-full flex items-center justify-center font-bold">
                            1</div>
                        <div
                            class="step-indicator w-10 h-10 rounded-full flex items-center justify-center font-bold bg-white text-luxe-gray">
                            2</div>
                        <div
                            class="step-indicator w-10 h-10 rounded-full flex items-center justify-center font-bold bg-white text-luxe-gray">
                            3</div>
                        <div
                            class="step-indicator w-10 h-10 rounded-full flex items-center justify-center font-bold bg-white text-luxe-gray">
                            4</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Booking Form Section -->
        <section class="py-16 px-6">
            <div class="container mx-auto max-w-6xl">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <!-- Form Container -->
                    <div class="lg:col-span-2">
                        <div class="form-section rounded-2xl shadow-2xl p-8 md:p-10">
                            <h3 class="font-playfair text-3xl font-bold text-luxe-blue mb-2">Booking Details</h3>
                            <p class="text-gray-600 mb-8">Please provide your information to complete the reservation.
                                All fields marked with * are required.</p>

                                                        <form id="bookingForm" class="space-y-8">
                                <!-- Guest Information -->
                                <div>
                                    <h4
                                        class="text-xl font-semibold text-luxe-blue mb-6 pb-2 border-b border-gold-light">
                                        Guest Information</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name
                                                *</label>
                                            <input type="text" name="full_name" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number
                                                *</label>
                                            <input type="tel" name="phone" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address
                                                *</label>
                                            <input type="email" name="email" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests
                                                (Optional)</label>
                                            <input type="text" name="requests"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition"
                                                placeholder="e.g., Early check-in, anniversary celebration">
                                        </div>
                                    </div>
                                </div>

                                <!-- Stay Dates -->
                                <div>
                                    <h4
                                        class="text-xl font-semibold text-luxe-blue mb-6 pb-2 border-b border-gold-light">
                                        Stay Dates</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Check-In Date
                                                *</label>
                                            <input type="date" name="check_in" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Check-Out Date
                                                *</label>
                                            <input type="date" name="check_out" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred
                                                Check-in Time (Optional)</label>
                                            <select name="time"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                                <option value="">Select preferred time</option>
                                                <option value="12:00">12:00 PM</option>
                                                <option value="13:00">1:00 PM</option>
                                                <option value="14:00">2:00 PM</option>
                                                <option value="15:00">3:00 PM</option>
                                                <option value="16:00">4:00 PM</option>
                                            </select>
                                        </div>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Adults
                                                    *</label>
                                                <select name="adults" required
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                                    <option value="">Select</option>
                                                    <option value="1">1 Adult</option>
                                                    <option value="2">2 Adults</option>
                                                    <option value="3">3 Adults</option>
                                                    <option value="4">4 Adults</option>
                                                    <option value="5">5+ Adults</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label
                                                    class="block text-sm font-medium text-gray-700 mb-2">Children</label>
                                                <select name="children"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                                    <option value="0">0 Children</option>
                                                    <option value="1">1 Child</option>
                                                    <option value="2">2 Children</option>
                                                    <option value="3">3 Children</option>
                                                    <option value="4">4 Children</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Room Selection -->
                                <div>
                                    <h4
                                        class="text-xl font-semibold text-luxe-blue mb-6 pb-2 border-b border-gold-light">
                                        Select Your Accommodation</h4>
                                    <div class="room-selection grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <!-- Room options will be dynamically populated -->
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Room Type (if not
                                            selected above)</label>
                                        <select name="room_id"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                            <option value="">Choose a room type</option>
                                            <option value="deluxe">Deluxe Room - $350/night</option>
                                            <option value="executive">Executive Suite - $550/night</option>
                                            <option value="presidential">Presidential Suite - $850/night</option>
                                            <option value="penthouse">Penthouse - $1,200/night</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Payment Information -->
                                {{-- <div>
                                    <h4
                                        class="text-xl font-semibold text-luxe-blue mb-6 pb-2 border-b border-gold-light">
                                        Payment Details</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name
                                                *</label>
                                            <input type="text" name="card_name" required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Card Number
                                                *</label>
                                            <input type="text" name="card_number" required
                                                placeholder="1234 5678 9012 3456"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date
                                                    *</label>
                                                <input type="month" name="card_expiry" required
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">CVV
                                                    *</label>
                                                <input type="text" name="card_cvv" required placeholder="123"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Billing Address
                                                (Optional)</label>
                                            <input type="text" name="billing_address"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold transition">
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Terms and Submit -->
                                <div class="pt-6 border-t border-gray-200">
                                    <div class="flex items-start mb-8">
                                        <input type="checkbox" id="terms" name="terms" required class="mt-1 mr-3">
                                        <label for="terms" class="text-sm text-gray-700">
                                            I agree to the <a href="#"
                                                class="text-gold font-medium hover:underline">Terms & Conditions</a>
                                            and <a href="#"
                                                class="text-gold font-medium hover:underline">Cancellation Policy</a>
                                            of Luxe Heritage Hotel. I understand that my credit card will be charged a
                                            deposit equal to one night's stay.
                                        </label>
                                    </div>

                                    <button type="submit" id="submitButton"
                                        class="w-full py-4 bg-luxe-teal text-white font-semibold rounded-lg hover:bg-luxe-blue transition duration-300 shadow-lg flex justify-center items-center">
                                        <span class="submit-text">Confirm Reservation & Secure Your Stay</span>
                                        <div class="loading-spinner">
                                            <i class="fas fa-circle-notch fa-spin mr-2"></i> Processing...
                                        </div>
                                    </button>

                                    <p class="text-center text-gray-500 text-sm mt-4">
                                        <i class="fas fa-lock text-gold mr-1"></i> Your information is secured with
                                        256-bit SSL encryption
                                    </p>
                                </div>
                            </form>


                        </div>
                    </div>

                    <!-- Sidebar / Summary -->
                    <div class="lg:col-span-1">
                        <!-- Booking Summary -->
                        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 luxury-border">
                            <h3 class="font-playfair text-2xl font-bold text-luxe-blue mb-6">Booking Summary</h3>

                            <div class="space-y-6">
                                <div class="flex justify-between pb-4 border-b">
                                    <span class="text-gray-600">Room Type:</span>
                                    <span class="font-semibold" id="summary-room">Not Selected</span>
                                </div>

                                <div class="flex justify-between pb-4 border-b">
                                    <span class="text-gray-600">Check-in:</span>
                                    <span class="font-semibold" id="summary-checkin">-- / -- / ----</span>
                                </div>

                                <div class="flex justify-between pb-4 border-b">
                                    <span class="text-gray-600">Check-out:</span>
                                    <span class="font-semibold" id="summary-checkout">-- / -- / ----</span>
                                </div>

                                <div class="flex justify-between pb-4 border-b">
                                    <span class="text-gray-600">Nights:</span>
                                    <span class="font-semibold" id="summary-nights">0</span>
                                </div>

                                <div class="flex justify-between pb-4 border-b">
                                    <span class="text-gray-600">Guests:</span>
                                    <span class="font-semibold" id="summary-guests">0 Adults, 0 Children</span>
                                </div>

                                <div class="pt-4">
                                    <div class="flex justify-between text-lg font-bold mb-2">
                                        <span>Total:</span>
                                        <span id="summary-total">$0.00</span>
                                    </div>
                                    <p class="text-sm text-gray-500">Includes all taxes and service charges</p>
                                </div>
                            </div>
                        </div>

                        <!-- Hotel Benefits -->
                        <div class="bg-luxe-blue text-white rounded-2xl shadow-xl p-8">
                            <h3 class="font-playfair text-2xl font-bold mb-6">Your Stay Includes</h3>

                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-gold mr-3 mt-1"></i>
                                    <span>Complimentary breakfast for two</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-gold mr-3 mt-1"></i>
                                    <span>Access to spa & wellness center</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-gold mr-3 mt-1"></i>
                                    <span>High-speed WiFi throughout the hotel</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-gold mr-3 mt-1"></i>
                                    <span>24/7 concierge service</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-gold mr-3 mt-1"></i>
                                    <span>Luxury toiletries and nightly turndown service</span>
                                </li>
                            </ul>

                            <div class="mt-8 pt-6 border-t border-gold-light">
                                <p class="text-gold-light">
                                    <i class="fas fa-phone-alt mr-2"></i> Need assistance? Call our reservation team:
                                    <a href="tel:+18001234567" class="font-bold hover:text-white transition">+1 (800)
                                        123-4567</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-luxe-blue text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <h3 class="font-playfair text-2xl font-bold mb-2">Luxe Heritage Hotel</h3>
                    <p class="text-gold-light">World-class luxury accommodation since 1928</p>
                </div>
                <div class="text-center md:text-right">
                    <p class="mb-2">123 Luxury Avenue, Prestige District, 10001</p>
                    <p>© 2023 Luxe Heritage Hotel. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Room data
            const rooms = [{
                    id: 'deluxe',
                    name: 'Deluxe Room',
                    price: 350,
                    description: 'Elegant room with city view, king bed, and marble bathroom',
                    amenities: ['City View', 'King Bed', 'Marble Bathroom', 'Free WiFi']
                },
                {
                    id: 'executive',
                    name: 'Executive Suite',
                    price: 550,
                    description: 'Spacious suite with separate living area and executive lounge access',
                    amenities: ['Living Area', 'Lounge Access', 'Panoramic View', 'Premium Amenities']
                },
                {
                    id: 'presidential',
                    name: 'Presidential Suite',
                    price: 850,
                    description: 'Lavish suite with private terrace, butler service, and dining area',
                    amenities: ['Private Terrace', 'Butler Service', 'Dining Area', 'Jacuzzi']
                },
                {
                    id: 'penthouse',
                    name: 'Penthouse',
                    price: 1200,
                    description: 'Ultimate luxury with rooftop access, private pool, and 360° views',
                    amenities: ['Rooftop Access', 'Private Pool', '360° Views', 'Personal Chef Available']
                }
            ];

            // Populate room cards
            const roomSelection = document.querySelector('.room-selection');
            rooms.forEach(room => {
                const roomCard = document.createElement('div');
                roomCard.className = 'room-card bg-white rounded-xl p-6 cursor-pointer border';
                roomCard.dataset.id = room.id;
                roomCard.dataset.price = room.price;
                roomCard.dataset.name = room.name;

                roomCard.innerHTML = `
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="font-bold text-lg">${room.name}</h4>
                        <span class="text-gold font-bold text-xl">$${room.price}<span class="text-sm font-normal">/night</span></span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">${room.description}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        ${room.amenities.map(amenity =>
                            `<span class="text-xs bg-gold-light text-luxe-gray px-3 py-1 rounded-full">${amenity}</span>`
                        ).join('')}
                    </div>
                    <button type="button" class="select-room-btn w-full py-2 text-center border border-gold text-gold rounded-lg hover:bg-gold hover:text-white transition">
                        Select Room
                    </button>
                `;

                roomSelection.appendChild(roomCard);
            });

            // Room selection functionality
            document.querySelectorAll('.room-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selected class from all cards
                    document.querySelectorAll('.room-card').forEach(c => {
                        c.classList.remove('selected');
                        c.querySelector('.select-room-btn').textContent = 'Select Room';
                        c.querySelector('.select-room-btn').classList.remove('bg-gold',
                            'text-white');
                        c.querySelector('.select-room-btn').classList.add('border',
                            'border-gold', 'text-gold');
                    });

                    // Add selected class to clicked card
                    this.classList.add('selected');
                    this.querySelector('.select-room-btn').textContent = 'Selected';
                    this.querySelector('.select-room-btn').classList.remove('border', 'border-gold',
                        'text-gold');
                    this.querySelector('.select-room-btn').classList.add('bg-gold', 'text-white');

                    // Update the room select dropdown
                    const roomSelect = document.querySelector('select[name="room_id"]');
                    roomSelect.value = this.dataset.id;

                    // Update summary
                    updateSummary();
                });
            });

            // Form field event listeners for live summary updates
            const formFields = ['check_in', 'check_out', 'adults', 'children', 'room_id'];
            formFields.forEach(field => {
                const element = document.querySelector(`[name="${field}"]`);
                if (element) {
                    element.addEventListener('change', updateSummary);
                }
            });

            // Update booking summary
            function updateSummary() {
                // Room
                const roomSelect = document.querySelector('select[name="room_id"]');
                const selectedRoomCard = document.querySelector('.room-card.selected');
                let roomName = 'Not Selected';
                let roomPrice = 0;

                if (selectedRoomCard) {
                    roomName = selectedRoomCard.dataset.name;
                    roomPrice = parseInt(selectedRoomCard.dataset.price);
                } else if (roomSelect.value) {
                    const room = rooms.find(r => r.id === roomSelect.value);
                    if (room) {
                        roomName = room.name;
                        roomPrice = room.price;
                    }
                }

                document.getElementById('summary-room').textContent = roomName;

                // Dates
                const checkin = document.querySelector('input[name="check_in"]').value;
                const checkout = document.querySelector('input[name="check_out"]').value;

                if (checkin) {
                    const date = new Date(checkin);
                    document.getElementById('summary-checkin').textContent =
                        `${date.getMonth()+1}/${date.getDate()}/${date.getFullYear()}`;
                }

                if (checkout) {
                    const date = new Date(checkout);
                    document.getElementById('summary-checkout').textContent =
                        `${date.getMonth()+1}/${date.getDate()}/${date.getFullYear()}`;
                }

                // Calculate nights
                let nights = 0;
                if (checkin && checkout) {
                    const checkinDate = new Date(checkin);
                    const checkoutDate = new Date(checkout);
                    const timeDiff = checkoutDate.getTime() - checkinDate.getTime();
                    nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
                    nights = nights > 0 ? nights : 0;
                }

                document.getElementById('summary-nights').textContent = nights;

                // Guests
                const adults = document.querySelector('select[name="adults"]').value || 0;
                const children = document.querySelector('select[name="children"]').value || 0;
                document.getElementById('summary-guests').textContent =
                    `${adults} Adult${adults != 1 ? 's' : ''}, ${children} Child${children != 1 ? 'ren' : ''}`;

                // Calculate total
                const total = roomPrice * nights;
                document.getElementById('summary-total').textContent =
                    total > 0 ? `$${total.toLocaleString()}.00` : '$0.00';
            }

            // Form submission
            const bookingForm = document.getElementById('bookingForm');
            const submitButton = document.getElementById('submitButton');

            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validate required fields
                const requiredFields = bookingForm.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                if (!isValid) {
                    alert('Please fill in all required fields.');
                    return;
                }

                // Show loading state
                submitButton.classList.add('loading');

                // Simulate form submission
                setTimeout(() => {
                    submitButton.classList.remove('loading');

                    // Show success message
                    alert(
                        'Thank you! Your reservation has been successfully submitted. A confirmation email will be sent shortly.');

                    // Reset form (in a real app, you might redirect instead)
                    bookingForm.reset();
                    document.querySelectorAll('.room-card').forEach(card => {
                        card.classList.remove('selected');
                        card.querySelector('.select-room-btn').textContent = 'Select Room';
                        card.querySelector('.select-room-btn').classList.remove('bg-gold',
                            'text-white');
                        card.querySelector('.select-room-btn').classList.add('border',
                            'border-gold', 'text-gold');
                    });
                    updateSummary();
                }, 2000);
            });

            // Initialize summary
            updateSummary();
        });
    </script>
</body>

</html>
