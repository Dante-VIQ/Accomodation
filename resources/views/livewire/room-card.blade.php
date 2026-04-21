<div class="bg-[#FDF9F3]" x-data="{ showToast: false, toastMessage: '' }"
    @hide-toast.window="setTimeout(() => { showToast = false }, 3000)">

    {{-- Hero Section --}}
    <section class="relative h-[45vh] min-h-[400px] flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('{{ asset('/images/15.JPG') }}');">
        <div class="relative z-10 text-center text-white px-6">
            <span
                class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                ✦ CURATED STAYS ✦
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight font-['Cormorant_Garamond']">
                Our <span class="text-amber-300">Luxury</span> Suites
            </h1>
            <p class="text-lg md:text-xl mt-4 max-w-2xl mx-auto text-amber-50/90">
                Each residence tells a story of elegance, comfort, and breathtaking views of Nakuru's wild heart.
            </p>
        </div>
    </section>

    {{-- Filter Bar --}}
    <div class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-md border-b border-stone-200">
        <div class="container mx-auto px-6 md:px-12 py-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                {{-- Search Input --}}
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-stone-400"></i>
                        <input type="text" wire:model.live.debounce.300ms="searchQuery" placeholder="Search suites..."
                            class="w-full pl-10 pr-4 py-2 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 bg-stone-50">
                    </div>
                </div>

                {{-- Category Filter --}}
                <div class="flex flex-wrap gap-2">
                    <button wire:click="setCategory('all')"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300
                                   {{ $activeCategory === 'all' ? 'bg-amber-700 text-white shadow-lg' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">
                        All Suites
                        @if(isset($categoriesList['counts']['all']) && $categoriesList['counts']['all'] > 0)
                            <span class="ml-1 text-xs">({{ $categoriesList['counts']['all'] }})</span>
                        @endif
                    </button>

                    @foreach($categoriesList['list'] ?? [] as $category)
                        <button wire:click="setCategory('{{ $category }}')"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300
                                       {{ $activeCategory === $category ? 'bg-amber-700 text-white shadow-lg' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">
                            {{ $category }}
                            @if(($categoriesList['counts'][$category] ?? 0) > 0)
                                <span class="ml-1 text-xs">({{ $categoriesList['counts'][$category] }})</span>
                            @endif
                        </button>
                    @endforeach
                </div>

                {{-- Sort Dropdown --}}
                <div class="relative">
                    <select wire:model.live="sortBy"
                        class="appearance-none bg-stone-100 border border-stone-300 text-stone-700 py-2 pl-4 pr-10 rounded-lg focus:outline-none focus:border-amber-500 cursor-pointer">
                        <option value="default">Sort by: Featured</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="name_asc">Name: A to Z</option>
                        <option value="rating_desc">Rating: Highest First</option>
                    </select>
                    <i
                        class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-stone-500 text-sm pointer-events-none"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Rooms Grid Section --}}
    <section class="py-16 md:py-20">
        <div class="container mx-auto px-6 md:px-12">

            {{-- Loading State --}}
            <div wire:loading class="text-center py-20">
                <i class="fas fa-spinner fa-spin text-4xl text-amber-700"></i>
                <p class="mt-4 text-stone-500">Loading luxurious suites...</p>
            </div>

            {{-- Section Header --}}
            @if($activeCategory === 'all')
                <div wire:loading.remove class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold text-stone-800">
                        Experiences That <span class="text-amber-700">Elevate</span> Your Stay
                    </h2>
                    <p class="text-stone-500 mt-3 max-w-2xl mx-auto">Discover our signature suites designed for
                        unforgettable moments.</p>
                </div>
            @else
                <div wire:loading.remove class="mb-8 text-center">
                    <h2 class="text-2xl md:text-3xl font-['Cormorant_Garamond'] font-semibold text-stone-800">
                        {{ ucfirst($activeCategory) }} Suites</h2>
                    <p class="text-stone-500 mt-2">
                        {{ $categoryDescriptions[$activeCategory] ?? 'Luxurious accommodations for discerning travelers' }}
                    </p>
                </div>
            @endif

            {{-- Rooms Grid --}}
            <div wire:loading.remove class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($rooms as $room)
                    <div
                        class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        {{-- Image Gallery --}}
                        <div class="relative h-80 overflow-hidden"
                            x-data="{ currentImage: 0, images: {{ json_encode($room->images) }}, roomName: {{ json_encode($room->name) }} }"
                            x-init="if(images.length > 1) { interval = setInterval(() => { currentImage = (currentImage + 1) % images.length }, 5000) }">
                      <template x-for="(img, idx) in images" :key="idx">
    <img :src="'/uploads/' + img"
         :alt="roomName"
         class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
         :class="currentImage === idx ? 'opacity-100' : 'opacity-0'">
</template>

                            {{-- Image Navigation Dots --}}
                            @if(count($room->gallery_images) > 1)
                                <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 z-10">
                                    <template x-for="(img, idx) in images" :key="idx">
                                        <button @click="currentImage = idx"
                                            class="w-2 h-2 rounded-full transition-all duration-300"
                                            :class="currentImage === idx ? 'bg-amber-500 w-4' : 'bg-white/60 hover:bg-white'">
                                        </button>
                                    </template>
                                </div>
                            @endif

                            {{-- Badges --}}
                            <div class="absolute top-4 left-4 flex gap-2 z-10">
                                @if($room->badge)
                                    <span
                                        class="bg-amber-700 text-white px-3 py-1 text-xs font-semibold rounded-full">{{ $room->badge }}</span>
                                @endif
                                @if($room->size)
                                    <span
                                        class="bg-black/60 backdrop-blur text-white px-3 py-1 text-xs font-semibold rounded-full">{{ $room->size }}</span>
                                @endif
                            </div>

                            {{-- Favorite Button --}}
                            <button wire:click="toggleFavorite({{ $room->id }})"
                                class="absolute top-4 right-4 bg-white/80 backdrop-blur rounded-full w-10 h-10 flex items-center justify-center transition hover:scale-110 z-10">
                                <i
                                    class="fas fa-heart {{ in_array($room->id, $favorites) ? 'text-red-500' : 'text-stone-400' }}"></i>
                            </button>
                        </div>

                        {{-- Room Details --}}
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-2xl font-semibold font-['Cormorant_Garamond'] text-stone-800">
                                    {{ $room->name }}</h3>
                                <div class="flex items-center gap-1 bg-amber-50 px-2 py-1 rounded">
                                    <i class="fas fa-star text-amber-500 text-sm"></i>
                                    <span
                                        class="text-sm font-semibold text-stone-700">{{ number_format($room->rating, 1) }}</span>
                                    <span class="text-xs text-stone-500">({{ $room->review_count }})</span>
                                </div>
                            </div>

                            <p class="text-stone-500 text-sm mb-3">{{ Str::limit($room->description, 100) }}</p>

                            {{-- Amenities Icons --}}
                            <div class="flex flex-wrap gap-3 mb-4 pt-2 border-t border-stone-100">
                                @foreach(array_slice($room->amenities_array, 0, 4) as $amenity)
                                    <div class="flex items-center gap-1 text-stone-600 text-xs">
                                        <i class="fas fa-check-circle text-amber-600 text-xs"></i>
                                        <span>{{ Str::limit($amenity, 20) }}</span>
                                    </div>
                                @endforeach
                                @if(count($room->amenities_array) > 4)
                                    <div class="text-xs text-stone-400 cursor-pointer hover:text-amber-600"
                                        wire:click="showAmenities({{ $room->id }})">
                                        +{{ count($room->amenities_array) - 4 }} more
                                    </div>
                                @endif
                            </div>

                            {{-- Price & Booking --}}
                            <div class="flex items-center justify-between mt-4 pt-3 border-t border-stone-200">
                                <div>
                                    <span class="text-xl font-bold text-amber-800">Ksh.
                                        {{ number_format($room->price, 0) }}</span>
                                    <span class="text-stone-500 text-sm">/ night</span>
                                    @if($room->best_season)
                                        <div class="text-xs text-stone-400">⭐ Best in {{ $room->best_season }}</div>
                                    @endif
                                </div>
                                <div class="flex gap-2">
                                    <button wire:click="quickView({{ $room->id }})"
                                        class="px-4 py-2 border border-amber-700 text-amber-700 rounded-lg hover:bg-amber-50 transition text-sm font-medium">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button wire:click="bookRoom({{ $room->id }})"
                                        class="px-5 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition text-sm font-medium flex items-center gap-1">
                                        Book <i class="fas fa-arrow-right text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <i class="fas fa-bed text-6xl text-stone-300 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-stone-600">No suites found</h3>
                        <p class="text-stone-500 mt-2">Try adjusting your filters or view all our luxurious accommodations.
                        </p>
                        <button wire:click="resetFilters"
                            class="mt-6 px-6 py-2 bg-amber-700 text-white rounded-lg hover:bg-amber-800 transition">
                            View All Suites
                        </button>
                    </div>
                @endforelse
            </div>

            {{-- Pagination Links --}}
            {{-- @if($rooms->hasPages())
            <div wire:loading.remove class="mt-12">
                {{ $rooms->links() }}
            </div>
            @endif --}}
        </div>
    </section>

    {{-- Quick View Modal --}}
    @if($modalOpen && $selectedRoom)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm overflow-y-auto"
            x-data="{ open: true }" x-show="open" x-transition.opacity.duration.300ms
            @keydown.escape.window="open = false; $wire.closeModal()">
            <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto relative" x-show="open"
                x-transition.scale.origin.center.duration.300ms @click.away="open = false; $wire.closeModal()">
                <button @click="open = false; $wire.closeModal()"
                    class="sticky top-4 right-4 float-right text-stone-400 hover:text-stone-800 text-2xl z-20 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                    <i class="fas fa-times"></i>
                </button>

                <div class="clear-both"></div>

                <div class="grid md:grid-cols-2 gap-0">
                    <div class="h-80 md:h-full">
                        <img src="{{ Storage::url($selectedRoom->image) }}" alt="{{ $selectedRoom->name }}"
                            class="w-full h-full object-cover rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none">
                    </div>
                    <div class="p-6 md:p-8">
                        <h2 class="text-3xl font-semibold font-['Cormorant_Garamond'] text-stone-800">
                            {{ $selectedRoom->name }}</h2>
                        <div class="flex items-center gap-2 mt-2">
                            <div class="flex text-amber-500">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <span class="text-sm text-stone-500">{{ number_format($selectedRoom->rating, 1) }} ·
                                {{ $selectedRoom->review_count }} reviews</span>
                        </div>

                        <div class="mt-4 space-y-3">
                            @if($selectedRoom->size)
                                <div class="flex gap-2 text-stone-600">
                                    <i class="fas fa-vector-square text-amber-600 w-5"></i>
                                    <span>{{ $selectedRoom->size }}</span>
                                </div>
                            @endif
                            @if($selectedRoom->capacity)
                                <div class="flex gap-2 text-stone-600">
                                    <i class="fas fa-users text-amber-600 w-5"></i>
                                    <span>Sleeps {{ $selectedRoom->capacity }}</span>
                                </div>
                            @endif
                            @if($selectedRoom->bed_type)
                                <div class="flex gap-2 text-stone-600">
                                    <i class="fas fa-bed text-amber-600 w-5"></i>
                                    <span>{{ $selectedRoom->bed_type }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <h4 class="font-semibold text-stone-800 mb-2">Full Amenities</h4>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach($selectedRoom->amenities_array as $amenity)
                                    <div class="flex items-center gap-2 text-sm text-stone-600">
                                        <i class="fas fa-check-circle text-amber-600 text-xs"></i>
                                        <span>{{ $amenity }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-stone-200 flex justify-between items-center">
                            <div>
                                <span
                                    class="text-3xl font-bold text-amber-800">${{ number_format($selectedRoom->price, 0) }}</span>
                                <span class="text-stone-500">/night</span>
                            </div>
                            <button wire:click="bookRoom({{ $selectedRoom->id }})"
                                class="px-6 py-3 bg-amber-700 hover:bg-amber-800 text-white rounded-lg transition font-semibold">
                                Book This Suite
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Amenities Modal --}}
    @if($amenitiesModalOpen && $amenitiesModalRoom)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
            x-data="{ open: true }" x-show="open" x-transition.opacity.duration.300ms
            @keydown.escape.window="open = false; $wire.closeAmenitiesModal()">
            <div class="bg-white rounded-xl max-w-md w-full p-6 relative" x-show="open" x-transition.scale.duration.300ms
                @click.away="open = false; $wire.closeAmenitiesModal()">
                <button @click="open = false; $wire.closeAmenitiesModal()"
                    class="absolute top-4 right-4 text-stone-400 hover:text-stone-800">
                    <i class="fas fa-times text-xl"></i>
                </button>
                <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] mb-4">All Amenities</h3>
                <div class="space-y-2 max-h-96 overflow-y-auto">
                    @foreach($amenitiesModalRoom->amenities_array as $amenity)
                        <div class="flex items-center gap-3 py-2 border-b border-stone-100">
                            <i class="fas fa-crown text-amber-600 w-5"></i>
                            <span>{{ $amenity }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Toast Notification --}}
    @if($showToast)
        <div x-data="{ show: true }" x-show="show"
            x-init="setTimeout(() => { show = false; $wire.dispatch('hide-toast'); }, 3000)" x-transition.duration.300
            class="fixed bottom-6 right-6 z-50 bg-stone-800 text-white rounded-lg shadow-2xl p-4 max-w-sm flex items-center gap-3">
            <i class="fas fa-check-circle text-green-400 text-xl"></i>
            <div>
                <p class="font-semibold">{{ $toastMessage }}</p>
            </div>
            <button @click="show = false" class="ml-4 text-stone-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>