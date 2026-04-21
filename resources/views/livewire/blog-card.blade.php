<div>
    {{-- Hero Section with Overlay and Texture --}}
    <section class="relative h-[55vh] min-h-[500px] flex items-center justify-center bg-cover bg-center bg-no-repeat"
             style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.65)), url('{{ asset('images/24.JPG') }}');">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg...')] opacity-10 mix-blend-overlay"></div> {{-- subtle texture --}}
        <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md rounded-full px-5 py-2 mb-6 border border-white/20">
                <i class="fas fa-feather-alt text-amber-300 text-sm"></i>
                <span class="text-xs tracking-widest uppercase font-medium">The Villaveh Journal</span>
            </div>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold tracking-tight font-['Playfair_Display'] leading-tight">
                Untamed <span class="text-amber-300">Stories</span>
            </h1>
            <p class="text-lg md:text-xl mt-6 max-w-2xl mx-auto text-stone-100 font-light leading-relaxed">
                Discover the soul of the wild – travel diaries, conservation insights, and hidden gems from our luxury retreat.
            </p>
            <div class="mt-8 flex justify-center gap-4">
                <a href="#blog-grid" class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-full transition-all shadow-lg">
                    Explore <i class="fas fa-arrow-down text-sm"></i>
                </a>
                <a href="/contact" class="inline-flex items-center gap-2 border border-white/40 hover:bg-white/10 px-6 py-3 rounded-full transition-all">
                    Inquire
                </a>
            </div>
        </div>
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white/70 text-xl"></i>
        </div>
    </section>

    {{-- Sticky Search + Filter Bar --}}
    <div class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-sm border-b border-stone-200 transition-all">
        <div class="container mx-auto px-6 md:px-12 py-4">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="relative w-full md:w-80">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-stone-400 text-sm"></i>
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Search stories..."
                           class="w-full pl-10 pr-4 py-2.5 border border-stone-300 rounded-full focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 bg-stone-50 text-sm">
                </div>
                {{-- <div class="flex gap-2">
                    <button wire:click="filterByCategory('all')" class="px-4 py-1.5 text-sm rounded-full transition-all {{ $activeCategory == 'all' ? 'bg-amber-600 text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">All</button>
                    <button wire:click="filterByCategory('safari')" class="px-4 py-1.5 text-sm rounded-full transition-all {{ $activeCategory == 'safari' ? 'bg-amber-600 text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">Safari</button>
                    <button wire:click="filterByCategory('luxury')" class="px-4 py-1.5 text-sm rounded-full transition-all {{ $activeCategory == 'luxury' ? 'bg-amber-600 text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">Luxury</button>
                    <button wire:click="filterByCategory('nature')" class="px-4 py-1.5 text-sm rounded-full transition-all {{ $activeCategory == 'nature' ? 'bg-amber-600 text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200' }}">Nature</button>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- Blog Grid with Masonry-like layout & Elegant Cards --}}
    <section id="blog-grid" class="py-20 bg-stone-50">
        <div class="container mx-auto px-6 md:px-12">
            {{-- Loading Animation --}}
            <div wire:loading class="fixed inset-0 bg-white/80 z-50 flex items-center justify-center backdrop-blur-sm">
                <div class="flex flex-col items-center">
                    <div class="relative w-16 h-16">
                        <div class="absolute inset-0 border-4 border-amber-200 rounded-full"></div>
                        <div class="absolute inset-0 border-4 border-amber-600 rounded-full border-t-transparent animate-spin"></div>
                    </div>
                    <p class="mt-4 text-stone-600 tracking-wide">Unfolding tales...</p>
                </div>
            </div>

            <div wire:loading.remove class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                @forelse($posts as $post)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translateY-2 flex flex-col h-full">
                    <a href="{{ route('blog.show', $post->slug ?? $post->id) }}" class="block flex flex-col h-full">
                        {{-- Image Container with Zoom & Overlay --}}
                        <div class="relative h-64 overflow-hidden bg-stone-200">
                            @if($post->image)
                                <img src="{{ Storage::disk('public_direct')->url($post->image) }}" alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-stone-300 to-stone-400 flex items-center justify-center">
                                    <i class="fas fa-tree text-4xl text-white/50"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            {{-- Category Badge --}}
                            @if($post->category)
                                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-stone-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                    {{ ucfirst($post->category) }}
                                </span>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-6 flex-grow">
                            <div class="flex items-center gap-2 text-xs text-stone-500 mb-3">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                <span class="w-1 h-1 bg-stone-400 rounded-full"></span>
                                <i class="far fa-clock"></i>
                                <span>{{ $post->reading_time ?? '3 min read' }}</span>
                            </div>
                            <h3 class="text-2xl font-bold font-['Playfair_Display'] text-stone-800 mb-3 group-hover:text-amber-700 transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="text-stone-600 text-sm leading-relaxed line-clamp-3 mb-4">
                                {{ Str::limit(strip_tags($post->body), 140) }}
                            </p>
                            <div class="inline-flex items-center gap-2 text-amber-700 font-medium text-sm group-hover:gap-3 transition-all">
                                Continue reading <i class="fas fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>
                </article>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-stone-100 mb-6">
                        <i class="fas fa-compass text-4xl text-stone-400"></i>
                    </div>
                    <h3 class="text-2xl font-serif text-stone-600">No stories found</h3>
                    <p class="text-stone-500 mt-2">Try a different search or explore our journal categories.</p>
                    <button wire:click="resetFilters" class="mt-6 inline-flex items-center gap-2 text-amber-700 border border-amber-700 px-6 py-2 rounded-full hover:bg-amber-700 hover:text-white transition-all">
                        <i class="fas fa-undo-alt"></i> Reset filters
                    </button>
                </div>
                @endforelse
            </div>

            {{-- Pagination with Elegant Styling --}}
            @if(method_exists($posts, 'hasPages') && $posts->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>

    {{-- Optional: Newsletter Signup to deepen engagement --}}
    <section class="py-16 bg-stone-900 text-white">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <i class="fas fa-envelope-open-text text-3xl text-amber-400 mb-4"></i>
            <h2 class="text-3xl md:text-4xl font-serif mb-3">Join the <span class="text-amber-400">Villaveh</span> Circle</h2>
            <p class="text-stone-300 max-w-xl mx-auto mb-8">Get exclusive safari tales, travel tips, and special offers.</p>
            <form wire:submit.prevent="subscribe" class="max-w-md mx-auto flex flex-col sm:flex-row gap-3">
                <input type="email" wire:model="email" placeholder="Your email address" class="flex-1 px-5 py-3 rounded-full bg-stone-800 border border-stone-700 focus:outline-none focus:border-amber-500 text-white">
                <button type="submit" class="bg-amber-600 hover:bg-amber-700 px-6 py-3 rounded-full font-semibold transition-all">Subscribe</button>
            </form>
        </div>
    </section>
</div>