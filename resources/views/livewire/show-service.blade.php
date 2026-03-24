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