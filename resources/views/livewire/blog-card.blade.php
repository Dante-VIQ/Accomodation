{{-- resources/views/livewire/blog-index.blade.php --}}
<div>
    {{-- Hero Section --}}
    <section class="relative h-[45vh] min-h-[400px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
             style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('{{ asset('images/blog-hero.jpg') }}');">
        <div class="relative z-10 text-center text-white px-6">
            <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                ✦ STORIES & INSIGHTS ✦
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight font-['Cormorant_Garamond']">
                Our <span class="text-amber-300">Blog</span>
            </h1>
            <p class="text-lg md:text-xl mt-4 max-w-2xl mx-auto text-amber-50/90">
                Inspiring tales, travel tips, and behind-the-scenes from Villaveh Gameview.
            </p>
        </div>
    </section>

    {{-- Search Bar --}}
    <div class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-md border-b border-stone-200">
        <div class="container mx-auto px-6 md:px-12 py-4">
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-stone-400"></i>
                    <input type="text" 
                           wire:model.live.debounce.300ms="search"
                           placeholder="Search articles..." 
                           class="w-full pl-10 pr-4 py-2 border border-stone-300 rounded-lg focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 bg-stone-50">
                </div>
            </div>
        </div>
    </div>

    {{-- Blog Grid --}}
    <section class="py-16 md:py-20">
        <div class="container mx-auto px-6 md:px-12">
            <div wire:loading class="text-center py-20">
                <i class="fas fa-spinner fa-spin text-4xl text-amber-700"></i>
                <p class="mt-4 text-stone-500">Loading articles...</p>
            </div>

            <div wire:loading.remove class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                <article class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500">
                    <a href="{{ route('blog', $post->id) }}" class="block">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-stone-500 mb-2">
                                {{ $post->created_at->format('M d, Y') }}
                            </div>
                            <h3 class="text-xl font-semibold font-['Cormorant_Garamond'] text-stone-800 mb-2 group-hover:text-amber-700 transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="text-stone-600 text-sm line-clamp-3">
                                {{ Str::limit(strip_tags($post->body), 120) }}
                            </p>
                            <div class="mt-4 text-amber-700 font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                                Read More <i class="fas fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>
                </article>
                @empty
                <div class="col-span-full text-center py-20">
                    <i class="fas fa-book-open text-6xl text-stone-300 mb-4"></i>
                    <h3 class="text-2xl font-semibold text-stone-600">No articles found</h3>
                    <p class="text-stone-500 mt-2">Try a different search term or check back later.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if(method_exists($posts, 'hasPages') && $posts->hasPages())
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
            @endif
        </div>
    </section>
</div>