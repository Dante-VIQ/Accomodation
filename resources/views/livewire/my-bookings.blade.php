<div class="bg-[#FDF9F3] min-h-screen mt-10">
    
    {{-- Hero Section --}}
    <section class="relative h-[40vh] min-h-[300px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
             style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('{{ asset('images/my-bookings-hero.jpg') }}');">
        <div class="relative z-10 text-center text-white px-6">
            <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                ✦ YOUR JOURNEY ✦
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight font-['Cormorant_Garamond']">
                My <span class="text-amber-300">Bookings</span>
            </h1>
            <p class="text-lg md:text-xl mt-4 max-w-2xl mx-auto text-amber-50/90">
                Manage your reservations, view details, and plan your luxurious escape.
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 md:px-12 py-12 md:py-20">
        
        {{-- Flash Messages --}}
        @if(session()->has('message'))
            <div class="mb-8 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                    <span>{{ session('message') }}</span>
                </div>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="mb-8 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{-- Empty State --}}
        @if($bookings->isEmpty())
            <div class="text-center py-20 bg-white rounded-2xl shadow-lg">
                <div class="w-24 h-24 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-calendar-alt text-4xl text-amber-700"></i>
                </div>
                <h3 class="text-2xl font-['Cormorant_Garamond'] font-semibold text-stone-800 mb-2">No Bookings Yet</h3>
                <p class="text-stone-500 max-w-md mx-auto mb-6">Ready for an unforgettable stay at Villaveh Gameview? Begin your journey today.</p>
                <a href="/reservation" class="inline-flex items-center gap-2 bg-amber-700 hover:bg-amber-800 text-white px-6 py-3 rounded-lg transition shadow-md">
                    <i class="fas fa-calendar-plus"></i> Book Your Stay
                </a>
            </div>
        @else
            {{-- Bookings Grid --}}
            <div class="grid gap-8">
                @foreach($bookings as $booking)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex flex-col md:flex-row">
                        {{-- Room Image --}}
                        <div class="md:w-1/3 lg:w-1/4 relative overflow-hidden">
                            <img src="{{ Storage::url($booking->room->image) }}" 
                                 alt="{{ $booking->room->name }}" 
                                 class="w-full h-56 md:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent md:from-black/30 md:to-transparent"></div>
                        </div>
                        
                        {{-- Booking Details --}}
                        <div class="flex-1 p-6 md:p-8">
                            <div class="flex flex-wrap justify-between items-start gap-4">
                                <div>
                                    <h3 class="text-2xl font-['Cormorant_Garamond'] font-semibold text-stone-800 group-hover:text-amber-700 transition-colors">
                                        {{ $booking->room->name }}
                                    </h3>
                                    <p class="text-stone-500 text-sm mt-1 flex items-center gap-1">
                                        <i class="fas fa-hashtag text-stone-400 text-xs"></i> Booking #{{ $booking->id }}
                                    </p>
                                </div>
                                
                                {{-- Status Badge --}}
                                <div class="flex items-center gap-2">
                                    @if($booking->status === 'confirmed')
                                        <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle text-green-600 text-xs"></i> Confirmed
                                        </span>
                                    @elseif($booking->status === 'pending')
                                        <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock text-yellow-600 text-xs"></i> Pending
                                        </span>
                                    @elseif($booking->status === 'cancelled')
                                        <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle text-red-600 text-xs"></i> Cancelled
                                        </span>
                                    @endif
                                    
                                    @if($booking->payment_status === 'paid')
                                        <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                            <i class="fas fa-credit-card text-emerald-600 text-xs"></i> Paid
                                        </span>
                                    @elseif($booking->payment_status === 'unpaid')
                                        <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-xs font-semibold bg-stone-100 text-stone-600">
                                            <i class="fas fa-hourglass-half text-stone-500 text-xs"></i> Unpaid
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Stay Info Grid --}}
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 border-t border-stone-100 pt-6">
                                <div>
                                    <span class="text-xs text-stone-500 uppercase tracking-wider">Check-in</span>
                                    <p class="font-medium text-stone-800 mt-1">{{ $booking->check_in->format('M d, Y') }}</p>
                                    @if($booking->preferred_time)
                                        <span class="text-xs text-stone-400">at {{ $booking->preferred_time }}</span>
                                    @endif
                                </div>
                                <div>
                                    <span class="text-xs text-stone-500 uppercase tracking-wider">Check-out</span>
                                    <p class="font-medium text-stone-800 mt-1">{{ $booking->check_out->format('M d, Y') }}</p>
                                    <span class="text-xs text-stone-400">{{ $booking->check_out->diffInDays($booking->check_in) }} nights</span>
                                </div>
                                <div>
                                    <span class="text-xs text-stone-500 uppercase tracking-wider">Guests</span>
                                    <p class="font-medium text-stone-800 mt-1">
                                        {{ $booking->adults }} Adult{{ $booking->adults != 1 ? 's' : '' }}
                                        @if($booking->children > 0)
                                            , {{ $booking->children }} Child{{ $booking->children != 1 ? 'ren' : '' }}
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <span class="text-xs text-stone-500 uppercase tracking-wider">Total</span>
                                    <p class="font-bold text-amber-700 text-lg mt-1">Ksh. {{ number_format($booking->total_price, 2) }}</p>
                                </div>
                            </div>
                            
                            {{-- Special Requests --}}
                            @if($booking->special_requests)
                            <div class="mt-4 p-3 bg-stone-50 rounded-lg border border-stone-100">
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-star-of-life text-amber-600 text-xs mt-1"></i>
                                    <div>
                                        <span class="text-xs text-stone-500 uppercase tracking-wider">Special Requests</span>
                                        <p class="text-sm text-stone-600 mt-1">{{ $booking->special_requests }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            {{-- Action Buttons --}}
                            @if($booking->status !== 'cancelled' && $booking->check_in > now())
                            <div class="mt-6 flex gap-3">
                                <button wire:click="cancel({{ $booking->id }})" 
                                        onclick="return confirm('Are you sure you want to cancel this booking? This action cannot be undone.')"
                                        class="inline-flex items-center gap-2 px-4 py-2 border border-red-300 text-red-600 hover:bg-red-50 rounded-lg transition text-sm font-medium">
                                    <i class="fas fa-times-circle"></i> Cancel Booking
                                </button>
                                {{-- @if($booking->payment_status === 'unpaid')
                                <a href="{{ route('payment', $booking->id) }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition text-sm font-medium">
                                    <i class="fas fa-credit-card"></i> Pay Now
                                </a>
                                @endif --}}
                            </div>
                            @endif
                            
                            {{-- Past Stay Message --}}
                            @if($booking->check_out < now() && $booking->status !== 'cancelled')
                            <div class="mt-6 p-3 bg-stone-50 rounded-lg text-sm text-stone-500 flex items-center gap-2">
                                <i class="fas fa-history text-amber-600"></i>
                                <span>Your stay has ended. We hope you had a wonderful experience!</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{-- Optional Pagination --}}
            @if(method_exists($bookings, 'links') && $bookings->hasPages())
            <div class="mt-12">
                {{ $bookings->links() }}
            </div>
            @endif
        @endif
    </div>
</div>