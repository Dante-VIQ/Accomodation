@php
    $openingDate = \Carbon\Carbon::parse(config('app.grand_opening_date'));
    $isOpen = $openingDate->isPast();
@endphp

@if(!$isOpen)
    {{-- Countdown Section --}}
    <div x-data="countdownTimer('{{ config('app.grand_opening_date') }}')" 
         x-init="startTimer()" 
         class="bg-gradient-to-br from-amber-900 to-amber-800 py-20 text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                    ✦ COMING SOON ✦
                </span>
                <h2 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] font-bold mb-4">
                    Villaveh Gameview Grand Opening
                </h2>
                <p class="text-lg text-amber-100/90 mb-12 max-w-2xl mx-auto">
                    The wait is almost over. Prepare to experience unparalleled luxury in Nakuru.
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-4xl md:text-5xl font-bold" x-text="days">00</div>
                        <div class="text-sm uppercase tracking-wider mt-2 text-amber-200">Days</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-4xl md:text-5xl font-bold" x-text="hours">00</div>
                        <div class="text-sm uppercase tracking-wider mt-2 text-amber-200">Hours</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-4xl md:text-5xl font-bold" x-text="minutes">00</div>
                        <div class="text-sm uppercase tracking-wider mt-2 text-amber-200">Minutes</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-4xl md:text-5xl font-bold" x-text="seconds">00</div>
                        <div class="text-sm uppercase tracking-wider mt-2 text-amber-200">Seconds</div>
                    </div>
                </div>

                <div class="mt-12">
                    <a href="#reservation" class="inline-flex items-center gap-2 bg-white text-amber-800 hover:bg-amber-50 px-8 py-3 rounded-lg font-semibold transition shadow-lg">
                        <i class="fas fa-bell"></i> Notify Me When We Open
                    </a>
                </div>
            </div>
        </div>
    </div>
@else
    {{-- Grand Opening Offer Section --}}
    <div class="bg-gradient-to-br from-amber-900 to-amber-800 py-20 text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                    ✦ NOW OPEN ✦
                </span>
                <h2 class="text-4xl md:text-5xl font-['Cormorant_Garamond'] font-bold mb-4">
                    We Are Open!
                </h2>
                <p class="text-lg text-amber-100/90 mb-6 max-w-2xl mx-auto">
                    Villaveh Gameview is now welcoming guests. Be among the first to experience our luxury haven in Nakuru.
                </p>

                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8 mb-8 inline-block">
                    <div class="text-3xl md:text-4xl font-bold text-amber-300">🎉 Grand Opening Special 🎉</div>
                    <div class="text-5xl md:text-6xl font-bold my-4">
                        {{ config('app.grand_opening_discount') }}% OFF
                    </div>
                    <div class="text-xl mb-4">for the first 50 bookings</div>
                    <div class="bg-white/20 rounded-lg px-6 py-3 inline-block">
                        Use code: <span class="font-mono font-bold text-amber-200">{{ config('app.grand_opening_promo_code') }}</span>
                    </div>
                </div>

                <div class="flex flex-wrap justify-center gap-4 mt-4">
                    <a href="{{ route('reservation') }}" class="inline-flex items-center gap-2 bg-white text-amber-800 hover:bg-amber-50 px-8 py-3 rounded-lg font-semibold transition shadow-lg">
                        <i class="fas fa-calendar-check"></i> Book Your Stay Now
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 border border-white text-white hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                </div>
                <p class="text-sm text-amber-100/70 mt-6">Limited time offer. Terms apply.</p>
            </div>
        </div>
    </div>
@endif

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