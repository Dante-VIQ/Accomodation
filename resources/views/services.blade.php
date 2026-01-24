<x-guest-layout>
<section class="relative bg-cover bg-center bg-no-repeat min-h-[80vh] lg:min-h-[90vh] overflow-hidden"
        style="background-image: url('images/luxury-hotel-entrance.jpg');">
        <!-- Enhanced overlay with gradient -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
        
        <!-- Subtle decorative elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-1 bg-gold-500"></div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-gold-500"></div>
        </div>

        <div class="relative z-20 h-full flex items-center">
            <div class="container mx-auto px-6 lg:px-12 xl:px-20">
                <div class="max-w-2xl lg:max-w-3xl">
                    <!-- Elegant welcome line -->
                    <div class="flex items-center mb-6">
                        <div class="h-px w-12 bg-gold-500 mr-4"></div>
                        <p class="text-gold-300 font-light tracking-widest text-sm uppercase">Welcome to Luxury</p>
                        <div class="h-px w-12 bg-gold-500 ml-4"></div>
                    </div>
                    
                    <!-- Main heading with luxury appeal -->
                    <h1 class="text-5xl lg:text-6xl xl:text-7xl font-serif font-light text-white mb-6 leading-tight">
                        <span class="block">Experience Unparalleled</span>
                        <span class="text-gold-300 font-normal">Elegance & Comfort</span>
                    </h1>
                    
                    <!-- Supporting text -->
                    <p class="text-xl lg:text-2xl text-gray-200 font-light mb-10 max-w-xl leading-relaxed">
                        Where timeless luxury meets contemporary sophistication. Your sanctuary of peace awaits.
                    </p>
                    
                    <!-- CTA Button -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#"
                           class="group relative inline-flex items-center justify-center px-8 py-4 bg-transparent border border-gold-500 text-gold-300 
                                  hover:bg-gold-500 hover:text-white transition-all duration-300 overflow-hidden">
                            <span class="relative z-10 font-medium tracking-wide">Explore Our Suites</span>
                            <div class="absolute inset-0 bg-gold-500 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                            <svg class="w-5 h-5 ml-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="#"
                           class="inline-flex items-center justify-center px-8 py-4 text-white border border-white/30 
                                  hover:bg-white/10 hover:border-white/50 transition-all duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="font-medium">Contact Concierge</span>
                        </a>
                    </div>
                    
                    <!-- Scroll indicator for luxury feel -->
                    <div class="absolute bottom-10 left-0 right-0 flex justify-center">
                        <div class="animate-bounce">
                            <div class="w-px h-12 bg-gradient-to-b from-gold-500 to-transparent mx-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional luxury decorative element -->
        <div class="absolute bottom-0 right-0 w-64 h-64 opacity-10">
            <div class="absolute inset-0 border-2 border-gold-400 transform rotate-45 translate-x-1/4 translate-y-1/4"></div>
        </div>
    </section>

    <livewire:service-card />


</x-guest-layout>
