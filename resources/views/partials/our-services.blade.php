@extends('layouts.app')

@section('title', 'Luxury Services & Experiences | Villaveh Gameview Nakuru')
@section('keywords', 'luxury services Nakuru, BnB experiences, safari packages, spa services, private dining, game drives Kenya')
@section('description', 'Discover unparalleled luxury services at Villaveh Gameview. From private safari experiences to spa wellness, gourmet dining, and bespoke concierge services tailored for your perfect stay in Nakuru.')

@section('content')
<div class="bg-[#FDF9F3]" x-data="servicesPage()" x-init="init()">
    
    {{-- Hero Section --}}
    <section class="relative h-[50vh] min-h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
             style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('{{ asset('/images/services-hero.jpg') }}');">
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
                <button @click="activeCategory = 'all'; filterServices()"
                        :class="activeCategory === 'all' ? 'bg-amber-700 text-white shadow-lg' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'"
                        class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-star"></i>
                    <span>All Services</span>
                </button>
                
                @foreach($categories as $category)
                <button @click="activeCategory = '{{ $category }}'; filterServices()"
                        :class="activeCategory === '{{ $category }}' ? 'bg-amber-700 text-white shadow-lg' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'"
                        class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2">
                    <i class="{{ $categoryIcons[$category] ?? 'fas fa-tag' }}"></i>
                    <span>{{ ucfirst($category) }}</span>
                </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Services Grid Section --}}
    <section class="py-16 md:py-20">
        <div class="container mx-auto px-6 md:px-12">
            
            {{-- Section Header --}}
            <div class="text-center mb-12" x-show="activeCategory === 'all'">
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold text-stone-800">
                    Experiences That <span class="text-amber-700">Elevate</span> Your Stay
                </h2>
                <p class="text-stone-500 mt-3 max-w-2xl mx-auto">Discover our signature services designed to create unforgettable moments during your Nakuru retreat.</p>
            </div>
            
            <div x-show="activeCategory !== 'all'" class="mb-8 text-center">
                <h2 class="text-2xl md:text-3xl font-['Cormorant_Garamond'] font-semibold text-stone-800" x-text="getActiveTabName() + ' Experiences'"></h2>
                <p class="text-stone-500 mt-2" x-text="getActiveTabDescription()"></p>
            </div>

            {{-- Services Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                     data-category="{{ $service->category }}">
                    {{-- Service Image --}}
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" 
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
                                      @click="showFeaturesModal({{ json_encode($service) }})">
                                    +{{ count($features) - 3 }} more
                                </span>
                            @endif
                        </div>
                        
                        {{-- Action Buttons --}}
                        <div class="flex gap-3 mt-4 pt-3 border-t border-stone-200">
                            <button @click="quickView({{ json_encode($service) }})" 
                                    class="flex-1 px-3 py-2 border border-amber-700 text-amber-700 rounded-lg hover:bg-amber-50 transition text-sm font-medium flex items-center justify-center gap-1">
                                <i class="fas fa-info-circle"></i> Details
                            </button>
                            <button @click="bookService({{ json_encode($service) }})" 
                                    class="flex-1 px-3 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition text-sm font-medium flex items-center justify-center gap-1">
                                <i class="fas fa-calendar-check"></i> Book
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($services->isEmpty())
            <div class="text-center py-20">
                <i class="fas fa-concierge-bell text-6xl text-stone-300 mb-4"></i>
                <h3 class="text-2xl font-semibold text-stone-600">No services found</h3>
                <p class="text-stone-500 mt-2">Check back soon for our luxurious experiences.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- Quick View Modal --}}
    <div x-show="modalOpen" 
         x-transition.opacity.duration.300ms
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm overflow-y-auto"
         x-cloak>
        <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto relative"
             x-show="modalOpen"
             x-transition.scale.origin.center.duration.300ms
             @click.away="modalOpen = false">
            <button @click="modalOpen = false" class="sticky top-4 right-4 float-right text-stone-400 hover:text-stone-800 text-2xl z-20 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="clear-both"></div>
            
            <div class="grid md:grid-cols-2 gap-0">
                <div class="h-80 md:h-full">
                    <img :src="selectedService?.image" :alt="selectedService?.name" class="w-full h-full object-cover rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none">
                </div>
                <div class="p-6 md:p-8">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-2xl md:text-3xl font-semibold font-['Cormorant_Garamond'] text-stone-800" x-text="selectedService?.name"></h2>
                        <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-semibold" x-text="selectedService?.category"></span>
                    </div>
                    
                    <div class="flex items-center gap-4 mt-2 text-sm text-stone-500">
                        <div class="flex items-center gap-1" x-show="selectedService?.duration">
                            <i class="far fa-clock text-amber-600"></i>
                            <span x-text="selectedService?.duration"></span>
                        </div>
                        <div class="flex items-center gap-1" x-show="selectedService?.group_size">
                            <i class="fas fa-users text-amber-600"></i>
                            <span x-text="'Up to ' + selectedService?.group_size + ' guests'"></span>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h4 class="font-semibold text-stone-800 mb-2">Full Description</h4>
                        <p class="text-stone-600 text-sm leading-relaxed" x-text="selectedService?.full_description || selectedService?.description"></p>
                    </div>
                    
                    <div class="mt-5">
                        <h4 class="font-semibold text-stone-800 mb-2">What's Included</h4>
                        <div class="grid grid-cols-1 gap-2">
                            <template x-for="feature in (selectedService?.features || [])" :key="feature">
                                <div class="flex items-center gap-2 text-sm text-stone-600">
                                    <i class="fas fa-check-circle text-amber-600 text-xs"></i>
                                    <span x-text="feature"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-stone-200 flex justify-between items-center">
                        <div x-show="selectedService?.price">
                            <span class="text-3xl font-bold text-amber-800" x-text="'$' + selectedService?.price"></span>
                            <span class="text-stone-500 text-sm" x-text="selectedService?.price_unit || '/person'"></span>
                        </div>
                        <div x-show="!selectedService?.price" class="text-stone-500 italic">
                            <i class="fas fa-gem text-amber-600"></i> Custom pricing available
                        </div>
                        <button @click="bookService(selectedService)" 
                                class="px-6 py-3 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition font-semibold">
                            Book This Experience
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Features Modal --}}
    <div x-show="featuresModalOpen" 
         x-transition.opacity.duration.300ms
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full p-6 relative"
             x-show="featuresModalOpen"
             x-transition.scale.duration.300ms
             @click.away="featuresModalOpen = false">
            <button @click="featuresModalOpen = false" class="absolute top-4 right-4 text-stone-400 hover:text-stone-800">
                <i class="fas fa-times text-xl"></i>
            </button>
            <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] mb-4">All Inclusions</h3>
            <div class="space-y-2 max-h-96 overflow-y-auto">
                <template x-for="feature in featuresModalService?.features" :key="feature">
                    <div class="flex items-center gap-3 py-2 border-b border-stone-100">
                        <i class="fas fa-crown text-amber-600 w-5"></i>
                        <span x-text="feature"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>

    {{-- Booking Toast Notification --}}
    <div x-show="showToast" 
         x-transition.duration.300
         class="fixed bottom-6 right-6 z-50 bg-stone-800 text-white rounded-lg shadow-2xl p-4 max-w-sm flex items-center gap-3"
         x-cloak>
        <i class="fas fa-check-circle text-green-400 text-xl"></i>
        <div>
            <p class="font-semibold" x-text="toastMessage"></p>
            <p class="text-sm text-stone-300">Our concierge will contact you shortly.</p>
        </div>
        <button @click="showToast = false" class="ml-4 text-stone-400 hover:text-white">
            <i class="fas fa-times"></i>
        </button>
    </div>

    {{-- Newsletter Section --}}
    <section class="py-20 bg-gradient-to-r from-amber-800 to-amber-900 text-white">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <div class="max-w-2xl mx-auto">
                <i class="fas fa-envelope-open-text text-4xl mb-4"></i>
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mb-3">Stay Inspired</h2>
                <p class="text-amber-100 mb-6">Subscribe to receive exclusive offers and travel inspiration from Villaveh Gameview.</p>
                
                <form @submit.prevent="subscribeNewsletter()" class="flex flex-col sm:flex-row gap-3">
                    <input type="email" 
                           x-model="newsletterEmail"
                           placeholder="Your email address" 
                           class="flex-1 px-4 py-3 rounded-lg text-stone-800 focus:outline-none focus:ring-2 focus:ring-amber-400"
                           required>
                    <button type="submit" 
                            class="px-6 py-3 bg-white text-amber-800 rounded-lg font-semibold hover:bg-stone-100 transition">
                        Subscribe
                    </button>
                </form>
                <p class="text-xs text-amber-200 mt-3">No spam, just inspiration. Unsubscribe anytime.</p>
            </div>
        </div>
    </section>
</div>

{{-- Alpine.js Component Script --}}
<script>
    function servicesPage() {
        return {
            // State
            services: @json($services),
            filteredServices: [],
            activeCategory: 'all',
            modalOpen: false,
            selectedService: null,
            featuresModalOpen: false,
            featuresModalService: null,
            showToast: false,
            toastMessage: '',
            newsletterEmail: '',
            
            init() {
                this.filteredServices = this.services;
                this.updateCategoryCounts();
            },
            
            filterServices() {
                if (this.activeCategory === 'all') {
                    this.filteredServices = this.services;
                } else {
                    this.filteredServices = this.services.filter(service => 
                        service.category === this.activeCategory
                    );
                }
            },
            
            updateCategoryCounts() {
                // This can be used to show counts on category tabs if needed
            },
            
            getActiveTabName() {
                if (this.activeCategory === 'all') return 'All';
                return this.activeCategory.charAt(0).toUpperCase() + this.activeCategory.slice(1);
            },
            
            getActiveTabDescription() {
                const descriptions = {
                    'safari': 'Immersive wildlife encounters with expert guides',
                    'wellness': 'Rejuvenating treatments and holistic wellness',
                    'dining': 'Culinary excellence with local and international flavors',
                    'adventure': 'Thrilling experiences for the adventurous spirit',
                    'concierge': 'Personalized service tailored to your needs'
                };
                return descriptions[this.activeCategory] || 'Curated experiences for unforgettable moments';
            },
            
            quickView(service) {
                // Parse features if it's a string
                if (typeof service.features === 'string') {
                    service.features = JSON.parse(service.features);
                }
                this.selectedService = service;
                this.modalOpen = true;
            },
            
            showFeaturesModal(service) {
                if (typeof service.features === 'string') {
                    service.features = JSON.parse(service.features);
                }
                this.featuresModalService = service;
                this.featuresModalOpen = true;
            },
            
            bookService(service) {
                this.toastMessage = `${service.name} booking request sent!`;
                this.showToast = true;
                this.modalOpen = false;
                
                // Here you would typically send an AJAX request to your backend
                fetch('{{ route("services.book") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        service_id: service.id,
                        service_name: service.name
                    })
                }).catch(error => console.error('Error:', error));
                
                setTimeout(() => {
                    this.showToast = false;
                }, 3000);
            },
            
            subscribeNewsletter() {
                if (this.newsletterEmail) {
                    // Here you would typically send to your newsletter service
                    fetch('{{ route("newsletter.subscribe") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            email: this.newsletterEmail
                        })
                    }).catch(error => console.error('Error:', error));
                    
                    this.showToast = true;
                    this.toastMessage = 'Subscribed successfully!';
                    this.newsletterEmail = '';
                    
                    setTimeout(() => {
                        this.showToast = false;
                    }, 3000);
                }
            }
        }
    }
</script>

<style>
    [x-cloak] { display: none !important; }
    .scroll-smooth { scroll-behavior: smooth; }
</style>
@endsection