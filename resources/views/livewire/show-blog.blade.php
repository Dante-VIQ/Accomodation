{{-- resources/views/livewire/blog-show.blade.php --}}
<div class="bg-[#FDF9F3]">
    <div class="container mx-auto px-6 md:px-12 py-12 md:py-20">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-amber-700 hover:text-amber-800 mb-6">
                <i class="fas fa-arrow-left"></i> Back to all articles
            </a>

            @if($post->image)
            <div class="mb-8 rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
            </div>
            @endif

            <div class="text-stone-500 text-sm mb-4">
                {{ $post->created_at->format('F d, Y') }}
            </div>

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-['Cormorant_Garamond'] font-bold text-stone-800 mb-6">
                {{ $post->title }}
            </h1>

            <div class="prose prose-stone max-w-none">
                {!! nl2br(e($post->body)) !!}
            </div>

            {{-- Optional: Share buttons --}}
            <div class="mt-12 pt-6 border-t border-stone-200">
                <h3 class="text-lg font-semibold mb-3">Share this story</h3>
                <div class="flex gap-3">
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}" 
                       target="_blank" class="bg-stone-100 hover:bg-amber-100 p-2 rounded-full transition">
                        <i class="fab fa-twitter text-stone-600"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                       target="_blank" class="bg-stone-100 hover:bg-amber-100 p-2 rounded-full transition">
                        <i class="fab fa-facebook-f text-stone-600"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" 
                       target="_blank" class="bg-stone-100 hover:bg-amber-100 p-2 rounded-full transition">
                        <i class="fab fa-linkedin-in text-stone-600"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>