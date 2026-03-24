{{-- resources/views/livewire/reservation.blade.php --}}
<div>
    {{-- Hero Section --}}
    <section class="relative h-[45vh] min-h-[400px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
             style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('{{ asset('images/reservation-hero.jpg') }}');">
        <div class="relative z-10 text-center text-white px-6">
            <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                ✦ SECURE YOUR STAY ✦
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight font-['Cormorant_Garamond']">
                Reserve Your <span class="text-amber-300">Luxury</span> Escape
            </h1>
            <p class="text-lg md:text-xl mt-4 max-w-2xl mx-auto text-amber-50/90">
                Complete the form below to begin your unforgettable journey at Villaveh Gameview.
            </p>
        </div>
    </section>

    {{-- Step Indicators --}}
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-center space-x-4 mb-8">
            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold bg-amber-700 text-white">1</div>
            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold bg-stone-200 text-stone-600">2</div>
            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold bg-stone-200 text-stone-600">3</div>
            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold bg-stone-200 text-stone-600">4</div>
        </div>
    </div>

    {{-- Main Form Section --}}
    <section class="py-10 md:py-16">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid lg:grid-cols-3 gap-12">
                {{-- Form Container --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10">
                        <h2 class="text-3xl font-['Cormorant_Garamond'] font-bold text-stone-800 mb-2">Booking Details</h2>
                        <p class="text-stone-500 mb-8">Please provide your information to secure your reservation. All fields marked with * are required.</p>

                        <form wire:submit.prevent="save" class="space-y-8">
                            {{-- Guest Information --}}
                            <div>
                                <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] text-stone-800 mb-6 pb-2 border-b border-amber-200">Guest Information</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Full Name *</label>
                                        <input type="text" wire:model="full_name" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                        @error('full_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Phone Number *</label>
                                        <input type="tel" wire:model="phone" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Email Address *</label>
                                        <input type="email" wire:model="email" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Special Requests</label>
                                        <input type="text" wire:model="special_requests" placeholder="e.g., early check-in, anniversary celebration" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                    </div>
                                </div>
                            </div>

                            {{-- Stay Dates --}}
                            <div>
                                <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] text-stone-800 mb-6 pb-2 border-b border-amber-200">Stay Dates</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Check-In Date *</label>
                                        <input type="date" wire:model="check_in" min="{{ now()->format('Y-m-d') }}" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                        @error('check_in') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Check-Out Date *</label>
                                        <input type="date" wire:model="check_out" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                        @error('check_out') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-stone-700 mb-2">Preferred Check-in Time</label>
                                        <select wire:model="preferred_time" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
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
                                            <label class="block text-sm font-medium text-stone-700 mb-2">Adults *</label>
                                            <select wire:model="adults" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
                                                <option value="1">1 Adult</option>
                                                <option value="2">2 Adults</option>
                                                <option value="3">3 Adults</option>
                                                <option value="4">4 Adults</option>
                                                <option value="5">5+ Adults</option>
                                            </select>
                                            @error('adults') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-stone-700 mb-2">Children</label>
                                            <select wire:model="children" class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-200 bg-stone-50">
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

                            {{-- Room Selection --}}
                            <div>
                                <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] text-stone-800 mb-6 pb-2 border-b border-amber-200">Select Your Suite</h3>
                                <div class="grid md:grid-cols-2 gap-6 mb-6">
                                    @foreach($rooms as $room)
                                    <div wire:click="selectRoom({{ $room->id }})" 
                                         class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer border-2 {{ $room_id == $room->id ? 'border-amber-500' : 'border-transparent' }}">
                                        <div class="relative h-48 overflow-hidden">
                                            <img src="{{ Storage::url($room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                            <div class="absolute top-3 left-3">
                                                @if($room->badge)
                                                <span class="bg-amber-700 text-white px-2 py-1 text-xs font-semibold rounded">{{ $room->badge }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="font-bold text-lg text-stone-800">{{ $room->name }}</h4>
                                                <span class="text-amber-700 font-bold">Ksh. {{ number_format($room->price, 0) }}<span class="text-sm font-normal">/night</span></span>
                                            </div>
                                            <p class="text-stone-600 text-sm mb-3">{{ Str::limit($room->description, 80) }}</p>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach(array_slice($room->amenities_array, 0, 3) as $amenity)
                                                <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded-full">{{ $amenity }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @error('room_id') <span class="text-red-500 text-xs block mt-2">{{ $message }}</span> @enderror
                            </div>

                            {{-- Terms and Submit --}}
                            <div class="pt-6 border-t border-stone-200">
                                <div class="flex items-start mb-8">
                                    <input type="checkbox" wire:model="terms" id="terms" class="mt-1 mr-3">
                                    <label for="terms" class="text-sm text-stone-600">
                                        I agree to the <a href="#" class="text-amber-700 font-medium hover:underline">Terms & Conditions</a> and <a href="#" class="text-amber-700 font-medium hover:underline">Cancellation Policy</a> of Villaveh Gameview. I understand that a deposit equal to one night's stay may be required.
                                    </label>
                                </div>
                                @error('terms') <span class="text-red-500 text-xs block mt-2">{{ $message }}</span> @enderror

                                <button type="submit" wire:loading.attr="disabled" class="w-full py-4 bg-amber-700 hover:bg-amber-800 text-white font-semibold rounded-lg transition duration-300 shadow-lg flex justify-center items-center">
                                    <span wire:loading.remove>Confirm Reservation & Secure Your Stay</span>
                                    <span wire:loading><i class="fas fa-circle-notch fa-spin mr-2"></i> Processing...</span>
                                </button>
                                <p class="text-center text-stone-500 text-sm mt-4">
                                    <i class="fas fa-lock text-amber-600 mr-1"></i> Your information is secured with 256-bit SSL encryption
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Sidebar Summary --}}
                <div class="lg:col-span-1 space-y-8">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-amber-200">
                        <h3 class="text-2xl font-['Cormorant_Garamond'] font-bold text-stone-800 mb-6">Booking Summary</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between pb-3 border-b">
                                <span class="text-stone-600">Suite:</span>
                                <span class="font-semibold">{{ $selected_room ? $selected_room->name : 'Not Selected' }}</span>
                            </div>
                            <div class="flex justify-between pb-3 border-b">
                                <span class="text-stone-600">Check-in:</span>
                                <span class="font-semibold">{{ $check_in ? \Carbon\Carbon::parse($check_in)->format('M d, Y') : '--/--/----' }}</span>
                            </div>
                            <div class="flex justify-between pb-3 border-b">
                                <span class="text-stone-600">Check-out:</span>
                                <span class="font-semibold">{{ $check_out ? \Carbon\Carbon::parse($check_out)->format('M d, Y') : '--/--/----' }}</span>
                            </div>
                            <div class="flex justify-between pb-3 border-b">
                                <span class="text-stone-600">Nights:</span>
                                <span class="font-semibold">{{ $nights }}</span>
                            </div>
                            <div class="flex justify-between pb-3 border-b">
                                <span class="text-stone-600">Guests:</span>
                                <span class="font-semibold">{{ $adults }} Adult(s), {{ $children }} Child(ren)</span>
                            </div>
                            <div class="pt-3">
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total:</span>
                                    <span class="text-amber-700">Ksh. {{ number_format($total, 2) }}</span>
                                </div>
                                <p class="text-xs text-stone-400 mt-2">Includes all taxes and service charges</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-amber-800 to-amber-900 text-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-['Cormorant_Garamond'] font-bold mb-6">Your Stay Includes</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start"><i class="fas fa-check text-amber-300 mr-3 mt-1"></i> <span>Complimentary gourmet breakfast</span></li>
                            <li class="flex items-start"><i class="fas fa-check text-amber-300 mr-3 mt-1"></i> <span>Access to spa & wellness facilities</span></li>
                            <li class="flex items-start"><i class="fas fa-check text-amber-300 mr-3 mt-1"></i> <span>High-speed WiFi throughout the property</span></li>
                            <li class="flex items-start"><i class="fas fa-check text-amber-300 mr-3 mt-1"></i> <span>24/7 personalized concierge service</span></li>
                            <li class="flex items-start"><i class="fas fa-check text-amber-300 mr-3 mt-1"></i> <span>Luxury amenities and nightly turndown</span></li>
                        </ul>
                        <div class="mt-8 pt-6 border-t border-amber-700">
                            <p><i class="fas fa-phone-alt mr-2"></i> Need assistance? Call our reservation team: <a href="tel:+254110474109" class="font-bold hover:text-amber-300 transition">+254 110 474 109</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>