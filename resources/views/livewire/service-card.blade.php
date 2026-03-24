<div class="bg-[#FDF9F3]">
    
    {{-- Hero Section --}}
    <section class="relative h-[50vh] min-h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
             style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('{{ asset('images/services-hero.jpg') }}');">
        <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
            <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                ✦ BESPOKE EXPERIENCES ✦
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight font-['Cormorant_Garamond']">
                Curated <span class="text-amber-300">Luxury</span> Services
            </h1>
            <p class="text-lg md:text-xl mt-4 max-w-2xl mx-auto text-amber-50/90">
                Every moment tailored to perfection — from private safaris to intimate dining under the stars.
            </p>
        </div>
    </section>

    {{-- Service Categories Tabs --}}
    <div class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-md border-b border-stone-200">
        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-wrap justify-center gap-2 py-4">
                <button wire:click="setCategory('all')"
                        class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2
                               {{ $activeCategory === 'all' ? 'bg-amber-700 text-white shadow-lg' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">
                    <i class="fas fa-star"></i>
                    <span>All Services</span>
                    @if($categoryCounts['all'] ?? 0 > 0)
                        <span class="ml-1 text-xs {{ $activeCategory === 'all' ? 'text-amber-200' : 'text-stone-400' }}">({{ $categoryCounts['all'] ?? 0 }})</span>
                    @endif
                </button>
                
                @foreach($categories as $category)
                <button wire:click="setCategory('{{ $category }}')"
                        class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2
                               {{ $activeCategory === $category ? 'bg-amber-700 text-white shadow-lg' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">
                    <i class="{{ $categoryIcons[$category] ?? 'fas fa-tag' }}"></i>
                    <span>{{ ucfirst($category) }}</span>
                    @if(($categoryCounts[$category] ?? 0) > 0)
                        <span class="ml-1 text-xs {{ $activeCategory === $category ? 'text-amber-200' : 'text-stone-400' }}">({{ $categoryCounts[$category] }})</span>
                    @endif
                </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Services Grid Section --}}
    <section class="py-16 md:py-20">
        <div class="container mx-auto px-6 md:px-12">
            
            {{-- Loading State --}}
            <div wire:loading class="text-center py-20">
                <i class="fas fa-spinner fa-spin text-4xl text-amber-700"></i>
                <p class="mt-4 text-stone-500">Loading luxurious experiences...</p>
            </div>

            {{-- Section Header --}}
            <div wire:loading.remove class="text-center mb-12" x-show="activeCategory === 'all'">
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold text-stone-800">
                    Experiences That <span class="text-amber-700">Elevate</span> Your Stay
                </h2>
                <p class="text-stone-500 mt-3 max-w-2xl mx-auto">Discover our signature services designed to create unforgettable moments during your Nakuru retreat.</p>
            </div>
            
            <div wire:loading.remove x-show="activeCategory !== 'all'" class="mb-8 text-center">
                <h2 class="text-2xl md:text-3xl font-['Cormorant_Garamond'] font-semibold text-stone-800">{{ ucfirst($activeCategory) }} Experiences</h2>
                <p class="text-stone-500 mt-2">{{ $categoryDescriptions[$activeCategory] ?? 'Curated experiences for unforgettable moments' }}</p>
            </div>

            {{-- Services Grid --}}
            <div wire:loading.remove class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($this->services as $service)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    {{-- Service Image --}}
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $service->image }}" alt="{{ $service->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        {{-- Category Badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="bg-amber-700/90 backdrop-blur text-white px-3 py-1 text-xs font-semibold rounded-full">
                                {{ ucfirst($service->category) }}
                            </span>
                        </div>
                        
                        {{-- Price Badge (if applicable) --}}
                        @if($service->price)
                        <div class="absolute bottom-4 right-4">
                            <span class="bg-black/70 backdrop-blur text-white px-3 py-1.5 rounded-lg text-sm font-bold">
                                From ${{ number_format($service->price, 0) }}
                            </span>
                        </div>
                        @endif
                        
                        {{-- Popular Tag --}}
                        @if($service->is_popular)
                        <div class="absolute top-4 right-4">
                            <span class="bg-amber-500 text-white px-2 py-1 text-xs font-bold rounded-full flex items-center gap-1">
                                <i class="fas fa-fire text-xs"></i> Popular
                            </span>
                        </div>
                        @endif
                    </div>
                    
                    {{-- Service Details --}}
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] text-stone-800">{{ $service->name }}</h3>
                            @if($service->duration)
                            <div class="flex items-center gap-1">
                                <i class="far fa-clock text-amber-600 text-xs"></i>
                                <span class="text-xs text-stone-500">{{ $service->duration }}</span>
                            </div>
                            @endif
                        </div>
                        
                        <p class="text-stone-600 text-sm mb-4 leading-relaxed">{{ Str::limit($service->description, 120) }}</p>
                        
                        {{-- Key Features --}}
                        <div class="flex flex-wrap gap-2 mb-4">
                            @php
                                $features = is_array($service->features) ? $service->features : json_decode($service->features, true) ?? [];
                            @endphp
                            @foreach(array_slice($features, 0, 3) as $feature)
                                <span class="text-xs bg-stone-100 text-stone-600 px-2 py-1 rounded-full flex items-center gap-1">
                                    <i class="fas fa-check-circle text-amber-600 text-[10px]"></i>
                                    <span>{{ $feature }}</span>
                                </span>
                            @endforeach
                            @if(count($features) > 3)
                                <span class="text-xs text-amber-600 cursor-pointer hover:underline" 
                                      wire:click="showFeatures({{ $service->id }})">
                                    +{{ count($features) - 3 }} more
                                </span>
                            @endif
                        </div>
                        
                        {{-- Action Buttons --}}
                        <div class="flex gap-3 mt-4 pt-3 border-t border-stone-200">
                            <button wire:click="quickView({{ $service->id }})" 
                                    class="flex-1 px-3 py-2 border border-amber-700 text-amber-700 rounded-lg hover:bg-amber-50 transition text-sm font-medium flex items-center justify-center gap-1">
                                <i class="fas fa-info-circle"></i> Details
                            </button>
                            <button wire:click="bookService({{ $service->id }})" 
                                    class="flex-1 px-3 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition text-sm font-medium flex items-center justify-center gap-1">
                                <i class="fas fa-calendar-check"></i> Book
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <i class="fas fa-concierge-bell text-6xl text-stone-300 mb-4"></i>
                    <h3 class="text-2xl font-semibold text-stone-600">No services found</h3>
                    <p class="text-stone-500 mt-2">Check back soon for our luxurious experiences.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Quick View Modal --}}
    @if($modalOpen && $selectedService)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm overflow-y-auto"
         x-data="{ open: true }"
         x-show="open"
         x-transition.opacity.duration.300ms
         @keydown.escape.window="open = false; $wire.closeModal()">
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto relative"
             x-show="open"
             x-transition.scale.origin.center.duration.300ms
             @click.away="open = false; $wire.closeModal()">
            <button @click="open = false; $wire.closeModal()" class="sticky top-4 right-4 float-right text-stone-400 hover:text-stone-800 text-2xl z-20 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="clear-both"></div>
            
            <div class="grid md:grid-cols-2 gap-0">
                <div class="h-80 md:h-full">
                    <img src="{{ Storage::url($selectedService->image) }}" alt="{{ $selectedService->name }}" 
                         class="w-full h-full object-cover rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none">
                </div>
                <div class="p-6 md:p-8">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-2xl md:text-3xl font-semibold font-['Cormorant_Garamond'] text-stone-800">{{ $selectedService->name }}</h2>
                        <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-semibold">{{ ucfirst($selectedService->category) }}</span>
                    </div>
                    
                    <div class="flex items-center gap-4 mt-2 text-sm text-stone-500">
                        @if($selectedService->duration)
                        <div class="flex items-center gap-1">
                            <i class="far fa-clock text-amber-600"></i>
                            <span>{{ $selectedService->duration }}</span>
                        </div>
                        @endif
                        @if($selectedService->group_size)
                        <div class="flex items-center gap-1">
                            <i class="fas fa-users text-amber-600"></i>
                            <span>Up to {{ $selectedService->group_size }} guests</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="mt-4">
                        <h4 class="font-semibold text-stone-800 mb-2">Full Description</h4>
                        <p class="text-stone-600 text-sm leading-relaxed">{{ $selectedService->full_description ?? $selectedService->description }}</p>
                    </div>
                    
                    <div class="mt-5">
                        <h4 class="font-semibold text-stone-800 mb-2">What's Included</h4>
                        <div class="grid grid-cols-1 gap-2">
                            @php $features = is_array($selectedService->features) ? $selectedService->features : json_decode($selectedService->features, true) ?? []; @endphp
                            @foreach($features as $feature)
                                <div class="flex items-center gap-2 text-sm text-stone-600">
                                    <i class="fas fa-check-circle text-amber-600 text-xs"></i>
                                    <span>{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-stone-200 flex justify-between items-center">
                        <div>
                            @if($selectedService->price)
                            <span class="text-3xl font-bold text-amber-800">${{ number_format($selectedService->price, 0) }}</span>
                            <span class="text-stone-500 text-sm">{{ $selectedService->price_unit ?? '/person' }}</span>
                            @else
                            <div class="text-stone-500 italic">
                                <i class="fas fa-gem text-amber-600"></i> Custom pricing available
                            </div>
                            @endif
                        </div>
                        <button wire:click="bookService({{ $selectedService->id }})" 
                                wire:loading.attr="disabled"
                                class="px-6 py-3 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition font-semibold">
                            Book This Experience
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Features Modal --}}
    @if($featuresModalOpen && $featuresModalService)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
         x-data="{ open: true }"
         x-show="open"
         x-transition.opacity.duration.300ms
         @keydown.escape.window="open = false; $wire.closeFeaturesModal()">
        <div class="bg-white rounded-xl max-w-md w-full p-6 relative"
             x-show="open"
             x-transition.scale.duration.300ms
             @click.away="open = false; $wire.closeFeaturesModal()">
            <button @click="open = false; $wire.closeFeaturesModal()" class="absolute top-4 right-4 text-stone-400 hover:text-stone-800">
                <i class="fas fa-times text-xl"></i>
            </button>
            <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] mb-4">All Inclusions</h3>
            <div class="space-y-2 max-h-96 overflow-y-auto">
                @php $features = is_array($featuresModalService->features) ? $featuresModalService->features : json_decode($featuresModalService->features, true) ?? []; @endphp
                @foreach($features as $feature)
                    <div class="flex items-center gap-3 py-2 border-b border-stone-100">
                        <i class="fas fa-crown text-amber-600 w-5"></i>
                        <span>{{ $feature }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- Booking Toast Notification --}}
    @if($showToast)
    <div x-data="{ show: true }"
         x-show="show"
         x-transition.duration.300
         class="fixed bottom-6 right-6 z-50 bg-stone-800 text-white rounded-lg shadow-2xl p-4 max-w-sm flex items-center gap-3">
        <i class="fas fa-check-circle text-green-400 text-xl"></i>
        <div>
            <p class="font-semibold">{{ $toastMessage }}</p>
            <p class="text-sm text-stone-300">Our concierge will contact you shortly.</p>
        </div>
        <button @click="show = false" class="ml-4 text-stone-400 hover:text-white">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif

    {{-- Newsletter Section --}}
    <section class="py-20 bg-gradient-to-r from-amber-800 to-amber-900 text-white">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <div class="max-w-2xl mx-auto">
                <i class="fas fa-envelope-open-text text-4xl mb-4"></i>
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mb-3">Stay Inspired</h2>
                <p class="text-amber-100 mb-6">Subscribe to receive exclusive offers and travel inspiration from Villaveh Gameview.</p>
                
                <form wire:submit.prevent="subscribeNewsletter" class="flex flex-col sm:flex-row gap-3">
                    <input type="email" 
                           wire:model="newsletterEmail"
                           placeholder="Your email address" 
                           class="flex-1 px-4 py-3 rounded-lg text-stone-800 focus:outline-none focus:ring-2 focus:ring-amber-400"
                           required>
                    <button type="submit" 
                            wire:loading.attr="disabled"
                            class="px-6 py-3 bg-white text-amber-800 rounded-lg font-semibold hover:bg-stone-100 transition">
                        Subscribe
                    </button>
                </form>
                <p class="text-xs text-amber-200 mt-3">No spam, just inspiration. Unsubscribe anytime.</p>
            </div>
        </div>
    </section>
</div>