<x-guest-layout>
    <section class="relative bg-cover bg-opacity-50 bg-no-repeat h-[60vh]"
        style="background-image: url('images/bg_2.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="grid lg:grid-cols-1 grid-cols-1 gap-2 mx-auto">
            <div class="container h-full flex relative z-10 p-20 justify-center">
                <div class="w-full max-w-4xl text-white">
                    <h2 class="text-2xl text-gray-200 mb-2">Welcome to VillaVeh GameView</h2>
                    <h1 class="text-4xl text-gray-200 font-bold mb-6">Crafting Experiences. Delivering Results</h1>
                <div class="flex flex-wrap sm:gap-4 gap-2">
                    <a href="#" class="hidden sm:flex btn-primary mr-4 text-white">Learn more</a>

                    @include('partials.booking')
                </div>
                </div>
            </div>
        </div>
    </section>

    <livewire:service-card />


    <footer class="bg-gray-900 text-white py-10 p-5">
        <div class="container mx-auto grid md:grid-cols-4 gap-8">
            <div>
                <h2 class="text-xl font-bold mb-2"><a href="#" class="logo">Vacation Rental</a></h2>
                <p class="mb-2">A small river named Duden flows by their place and supplies it with the necessary
                    regelialia.</p>
                <a href="#" class="text-emerald-400">Read more <span
                        class="fa fa-chevron-right text-xs"></span></a>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-2">Services</h2>
                <ul class="list-disc pl-5">
                    <li>Map Direction</li>
                    <li>Accomodation Services</li>
                    <li>Great Experience</li>
                    <li>Perfect central location</li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-2">Tag cloud</h2>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-emerald-600 px-2 py-1 rounded">apartment</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">home</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">vacation</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">rental</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">rent</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">house</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">place</span>
                    <span class="bg-emerald-600 px-2 py-1 rounded">drinks</span>
                </div>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-2">Subscribe</h2>
                <form action="#" class="flex flex-col gap-2">
                    <input type="email" placeholder="Enter email address" class="input" />
                    <button type="submit" class="btn-primary">Subscribe</button>
                </form>
                <h2 class="text-xl font-bold mt-5 mb-2">Follow us</h2>
                <ul class="flex gap-3">
                    <li><a href="#" class="text-white"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#" class="text-white"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#" class="text-white"><span class="fa fa-instagram"></span></a></li>
                </ul>
            </div>
        </div>
        <div
            class="container mx-auto mt-10 border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm">&copy; {{ date('Y') }} VillaVeh. All rights reserved.</div>
            <div class="text-sm md:text-right">Designed by Daniel Maina</div>
        </div>
    </footer>
</x-guest-layout>
