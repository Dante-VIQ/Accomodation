<livewire:booking-form />

<livewire:service-card />

<!-- Room Feature Section (Tailwind grid/flex replica) -->
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
        <livewire:room-card />
    </div>
</div>
<!-- Testimonial Section -->
<div>
    <section class="py-16 bg-gray-100">
        {{-- <livewire:testimonial-card /> --}}
    </section>
</div>
<!-- About Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto grid md:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="w-full h-64 bg-cover bg-center rounded mb-4" style="background-image: url('images/hero3.png');">
            </div>
            <h2 class="text-2xl font-bold mb-2">The most recommended vacation rental</h2>
            <p class="text-gray-600">A small river named Duden flows by their place and supplies it with the necessary
                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even
                the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One
                day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                Grammar.</p>
        </div>
        <div class="w-full bg-gray-50 py-16">
            <div class="max-w-6xl mx-auto px-4">

                <!-- Heading -->
                <h2 class="text-4xl font-semibold text-gray-800 mb-4">
                    What we offer
                </h2>
                <p class="text-gray-600 max-w-2xl mb-12">
                    A small river named Duden flows by their place and supplies it with the necessary regelialia.
                    It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                </p>

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    <!-- Tea Coffee -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-pink-400 flex items-center justify-center text-white">
                            <!-- Coffee Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 font-semibold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9h7.5M9 12h6m-8.25 3h10.5m-3-6.75a3 3 0 013-3h.75a3 3 0 110 6h-.75a3 3 0 01-3-3zM3.75 7.5h.008v.008H3.75V7.5zm0 3h.008v.008H3.75V10.5zm0 3h.008v.008H3.75V13.5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Tea & Coffee</h3>
                            <p class="text-gray-600 text-sm">
                                Complimentary beverages available all day.
                            </p>
                        </div>
                    </div>

                    <!-- Hot Showers -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-pink-400 flex items-center justify-center text-white">
                            <!-- Shower Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 font-semibold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4.5a6 6 0 1112 0V8m-6 8.25v.008h.008v-.008H9zm0 3v.008h.008v-.008H9zm3-3v.008h.008v-.008H12zm0 3v.008h.008v-.008H12zm3-3v.008h.008v-.008H15zm0 3v.008h.008v-.008H15z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Hot Showers</h3>
                            <p class="text-gray-600 text-sm">
                                Always-heated, pressure-perfect showers.
                            </p>
                        </div>
                    </div>

                    <!-- Laundry -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-pink-400 flex items-center justify-center text-white">
                            <!-- Laundry Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 font-semibold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25m10.5-2.25V5.25M3 7.5h18M4.5 7.5V21h15V7.5M9 12a3 3 0 116 0 3 3 0 01-6 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Laundry</h3>
                            <p class="text-gray-600 text-sm">
                                Fast, reliable washing and drying services.
                            </p>
                        </div>
                    </div>

                    <!-- Air Conditioning -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-pink-400 flex items-center justify-center text-white">
                            <!-- AC Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 font-semibold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 7.5h16.5m-16.5 0v6.75A3.75 3.75 0 007.5 18h9a3.75 3.75 0 003.75-3.75V7.5m-16.5 0A3.75 3.75 0 017.5 3.75h9A3.75 3.75 0 0120.25 7.5m-5.25 6H9m0 3h6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Air Conditioning</h3>
                            <p class="text-gray-600 text-sm">
                                Cool and comfortable rooms with perfect climate.
                            </p>
                        </div>
                    </div>

                    <!-- Free Wifi -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-pink-400 flex items-center justify-center text-white">
                            <!-- Wifi Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 font-semibold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.288 15.712a3 3 0 014.424 0M6.17 13.582a6 6 0 018.66 0M4.05 11.45a9 9 0 0112.9 0M12 18.75h.008v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Free Wifi</h3>
                            <p class="text-gray-600 text-sm">
                                High-speed internet for all your devices.
                            </p>
                        </div>
                    </div>

                    <!-- Kitchen -->
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-pink-400 flex items-center justify-center text-white">
                            <!-- Kitchen Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-9 h-9 font-semibold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v18m10.5-18v18M3 7.5h18M3 12h18M3 16.5h18" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Kitchen</h3>
                            <p class="text-gray-600 text-sm">
                                Fully equipped modern kitchen for your meals.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</section>

<!-- Call to Action Section -->
<section class="relative  py-16 bg-emerald-600 text-white text-center"
    style="background-image: url('images/bg_1.jpg'); background-size: cover; background-position: center;">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-green-50 to-transparent -z-10"></div>
    <div class="py-16">
        <h2 class="text-3xl font-bold mb-4 text-gray-200">Ready to get started</h2>
        <p class="mb-6 font-semibold text-gray-100">It’s safe to book online with us! Get your dream stay in clicks or
            drop us a line with your
            questions.</p>
        <a href="#" class="btn-primary px-8 py-4">Book now</a>
        {{-- <a href="#" class="btn-white px-8 py-4 ml-4">Contact us</a> --}}
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

<!-- Footer -->

<!-- Loader -->
{{-- <div id="ftco-loader" class="show fullscreen flex items-center justify-center"><svg class="circular" width="48px"
        height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div> --}}
