<x-guest-layout>
    <section class="relative bg-cover bg-opacity-50 bg-no-repeat h-[60vh]"
        style="background-image: url('images/bg_2.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="grid lg:grid-cols-1 grid-cols-1 gap-2 mx-auto">
            <div class="container h-full flex relative z-10 p-20 justify-center">
                <div class="w-full max-w-4xl text-white">
                    <h2 class="text-2xl text-gray-200 mb-2">Welcome to VillaVeh</h2>
                    <h1 class="text-4xl text-gray-200 font-bold mb-6">Your daily spark of Knowledge and Inspiration.</h1>

                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-2">Latest news from our blog</h2>
            <span class="block text-lg text-gray-500 text-center mb-10">News &amp; Blog</span>
            <livewire:blog-card />
        </div>
    </section>
</x-guest-layout>
