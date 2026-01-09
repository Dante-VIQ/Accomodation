<x-guest-layout>
    <section class="relative min-h-screen bg-cover bg-center"
        style="background-image: url('images/hero3.png');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="grid lg:grid-cols-1 grid-cols-1 gap-2 mx-auto">
            <div class="container h-full flex relative z-10 p-20 justify-center">
                <div class="w-full max-w-4xl text-white">
                    <h2 class="text-2xl text-gray-200 mb-2">Welcome to VillaVeh GameView</h2>
                    <h1 class="text-4xl text-gray-200 font-bold mb-6">Explore our luxurious rooms</h1>
                    <div x-data="{ open: false }" class="lg:flex block space-x-4">
                        <a href="#" class="hidden sm:flex btn-primary">Learn more</a>
                        <button type="submit" class="lg:hidden block btn-primary">
                            Book Now
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="w-full flex flex-col md:flex-row py-10">
        <div class="flex flex-col w-[90%] lg:w-4/5 2xl:w-3/5 mx-auto">
            <div class="w-full md:w-4/5 md:mx-auto text-center pt-3 px-4 md:px-0">
                <h1 class="text-3xl mt-2 md:text-4xl font-semibold text-gray-800">
                    <span class="text-emerald-600"> Our</span> Rooms
                </h1>
                <p class="text-xl font-thin mb-4 line-clamp-4 mt-4 md:line-clamp-none text-gray-500">
                    This Villa features various high end rooms. Designed to maximize your experience here.
                </p>
            </div>
            <div class="flex flex-col md:flex-row w-full">
                <livewire:room-card />
            </div>
        </div>
    </div>

</x-guest-layout>
