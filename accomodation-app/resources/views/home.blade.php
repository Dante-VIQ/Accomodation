<!-- Full TailwindCSS replica of index.blade.php -->
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('images/bg_1.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2 mx-auto">
        <div class="container h-full flex relative z-10 p-20 justify-center">
            <div class="w-full max-w-4xl text-white">
                <h2 class="text-2xl font-light mb-2">Welcome to VillaVeroh</h2>
                <h1 class="text-4xl font-bold mb-6">Book an appartment for your vacation</h1>
                <div  x-data="{ open: false }" class="lg:flex block space-x-4">
                    <a href="#" class="hidden sm:flex btn-primary">Learn more</a>
                    <button type="submit" class="lg:hidden block btn-primary">
                        Book Now

                    </button>
                    <a href="#" class="btn-white">Contact us</a>
                </div>
            </div>
        </div>
        <div class="hidden container mx-auto lg:flex justify-end p-10">
            <div class="w-full max-w-lg bg-gray-50 rounded-lg shadow p-8 justify-end bg-opacity-70 relative z-10">
                <form action="#" class="space-y-6">
                    <h3 class="text-2xl font-semibold mb-4">Book your apartment</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" class="input" placeholder="Full Name" />
                        <input type="text" class="input" placeholder="Phone number" />
                        <input type="date" class="input" placeholder="Check-In" />
                        <input type="date" class="input" placeholder="Check-Out" />
                        <select class="input">
                            <option>Adults</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <select class="input">
                            <option>Children</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <input type="text" class="input" placeholder="Time" />
                    </div>
                    <button type="submit" class="btn-primary w-full py-3">Book Appartment Now</button>
                </form>
            </div>
        </div>

    </div>

</div>

{{-- <section class="py-16 bg-opacity-50 absolute top-10 p-4 right-5">
  <div class="container mx-auto flex justify-end">
    <div class="w-full max-w-lg bg-gray-50 rounded-lg shadow p-8">
      <form action="#" class="space-y-6">
        <h3 class="text-2xl font-semibold mb-4">Book your apartment</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input type="text" class="input" placeholder="Full Name" />
          <input type="text" class="input" placeholder="Phone number" />
          <input type="date" class="input" placeholder="Check-In" />
          <input type="date" class="input" placeholder="Check-Out" />
          <select class="input">
            <option>Adults</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <select class="input">
            <option>Children</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <input type="text" class="input" placeholder="Time" />
        </div>
        <button type="submit" class="btn-primary w-full py-3">Book Appartment Now</button>
      </form>
    </div>
  </div>
</section> --}}

<section class="relative -mt-28 p-8">
    <div class="container mx-auto grid md:grid-cols-3 gap-8 z-90">
        <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
            <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                style="background-image: url('images/services-1.jpg');"></div>
            <h3 class="text-xl font-bold mb-2">Map Direction</h3>
            <p class="text-gray-600">Even the all-powerful Pointing has no control about the blind texts it is an almost
                unorthographic.</p>
            <a href="#" class="btn-primary mt-4">Read more</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
            <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                style="background-image: url('images/services-2.jpg');"></div>
            <h3 class="text-xl font-bold mb-2">Accomodation Services</h3>
            <p class="text-gray-600">Even the all-powerful Pointing has no control about the blind texts it is an almost
                unorthographic.</p>
            <a href="#" class="btn-primary mt-4">Read more</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
            <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                style="background-image: url('images/services-3.jpg');"></div>
            <h3 class="text-xl font-bold mb-2">Great Experience</h3>
            <p class="text-gray-600">Even the all-powerful Pointing has no control about the blind texts it is an almost
                unorthographic.</p>
            <a href="#" class="btn-primary mt-4">Read more</a>
        </div>
    </div>
</section>

<!-- Room Feature Section (Tailwind grid/flex replica) -->
<div class="w-full flex flex-col md:flex-row py-10">
    <div class="flex flex-col w-[90%] lg:w-4/5 2xl:w-3/5 mx-auto">
        <div class="w-full md:w-4/5 md:mx-auto text-center pt-3 px-4 md:px-0">
            <h1 class="text-3xl mt-2 md:text-4xl font-semibold text-gray-800">
                The <span class="text-emerald-600"> Feature</span> component
            </h1>
            <p class="text-xl font-thin mb-4 line-clamp-4 mt-4 md:line-clamp-none text-gray-500">
                You can copy and paste it or modify however you want. Feel free to name the author in a hidden remark or
                to set the components as favorite. Optional you can you can contact the author and say thanks by send a
                message.
            </p>
        </div>
        <div class="flex flex-col md:flex-row w-full">
            <!-- Room 1 -->
            <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:mr-4 mt-6">
                <div class="flex flex-col relative">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full relative z-10 max-h-80" alt="" />
                    <div class="absolute z-20 bg-emerald-600 uppercase px-3 py-1 top-3 right-3 text-white text-sm">Wifi
                        — TV (Cable)</div>
                </div>
                <div class="flex flex-col px-4">
                    <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">Saison room</p>
                    <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                            class="text-emerald-600">Single</span> room</h1>
                    <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">You have the option of
                        canceling by 6 pm on the day of arrival. Dogs must be requested in advance. The max lines is set
                        to three and all over are invisible. Hover with your mouse or push with a finger on your mobile
                        device on the text to show all lines.</p>
                </div>
                <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                    <div class="w-1/2 flex flex-row dark:text-gray-400"><span class="mr-1">$</span><span>89.00 ¬
                            Night</span></div>
                    <div class="w-1/2 text-yellow-400 text-right font-semibold">☆☆☆☆<span
                            class="text-gray-500 font-normal">☆</span></div>
                </div>
            </div>
            <!-- Room 2 -->
            <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:mx-4 mt-6">
                <div class="flex flex-col relative">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full relative z-10 max-h-80" alt="" />
                    <div class="absolute z-20 bg-emerald-600 uppercase px-3 py-1 top-3 right-3 text-white text-sm">Wifi
                        — TV (Cable)</div>
                </div>
                <div class="flex flex-col px-4">
                    <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">Saison room</p>
                    <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                            class="text-emerald-600">Love</span> Suite</h1>
                    <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">In this suite there is a
                        double bed and a bottle of sparkling wine on request at check-in. The max lines is set to three
                        and all over are invisible. Hover with your mouse or push with a finger on your mobile device on
                        the text to show all lines.</p>
                </div>
                <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                    <div class="basis-1/2 flex flex-row dark:text-gray-400"><span class="mr-1">$</span><span>119.00
                            ¬
                            Night</span></div>
                    <div class="basis-1/2 text-yellow-400 text-end font-semibold">☆☆☆<span
                            class="text-gray-500 font-normal">☆☆</span></div>
                </div>
            </div>
            <!-- Room 3 -->
            <div class="basis-1/3 w-full border border-gray-100 dark:border-gray-600 rounded-md pr-0 md:ml-4 mt-6">
                <div class="flex flex-col relative">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full relative z-10 max-h-80" alt="" />
                    <div class="absolute z-20 bg-emerald-600 uppercase px-3 py-1 top-3 right-3 text-white text-sm">Wifi
                        — TV (Sky)</div>
                </div>
                <div class="flex flex-col px-4">
                    <p class="text-sm mt-3 text-gray-300 dark:text-gray-600 font-semibold">Premium room</p>
                    <h1 class="text-2xl my-2 md:text-3xl font-bold text-gray-600 "><span
                            class="text-emerald-600">Individual</span> room</h1>
                    <p class="text-sm mb-3 line-clamp-3 hover:line-clamp-none text-gray-500 ">We add up to two more
                        beds. Crib possible. Breakfast must be ordered <u>separately</u>. The max lines is set to three
                        and all over are invisible. Hover with your mouse or push with a finger on your mobile device on
                        the text to show all lines.</p>
                </div>
                <div class="flex flex-row py-3 px-4 border-t border-gray-100 dark:border-gray-600">
                    <div class="w-1/2 flex flex-row dark:text-gray-400"><span class="mr-1">$</span><span>149.00 ¬
                            Night</span></div>
                    <div class="w-1/2 text-yellow-400 text-end font-semibold">☆☆☆☆☆</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-10">Happy Clients &amp; Feedbacks</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg p-6 shadow text-center flex flex-col items-center">
                <img src="images/person_1.jpg" class="w-20 h-20 rounded-full mb-4" alt="Racky Henderson" />
                <p class="text-gray-700 italic mb-4">Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts.</p>
                <div class="font-bold">Racky Henderson</div>
                <span class="text-sm text-gray-500">Father</span>
            </div>
            <div class="bg-white rounded-lg p-6 shadow text-center flex flex-col items-center">
                <img src="images/person_2.jpg" class="w-20 h-20 rounded-full mb-4" alt="Henry Dee" />
                <p class="text-gray-700 italic mb-4">Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts.</p>
                <div class="font-bold">Henry Dee</div>
                <span class="text-sm text-gray-500">Businesswoman</span>
            </div>
            <div class="bg-white rounded-lg p-6 shadow text-center flex flex-col items-center">
                <img src="images/person_3.jpg" class="w-20 h-20 rounded-full mb-4" alt="Mark Huff" />
                <p class="text-gray-700 italic mb-4">Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts.</p>
                <div class="font-bold">Mark Huff</div>
                <span class="text-sm text-gray-500">Businesswoman</span>
            </div>
            <div class="bg-white rounded-lg p-6 shadow text-center flex flex-col items-center">
                <img src="images/person_4.jpg" class="w-20 h-20 rounded-full mb-4" alt="Rodel Golez" />
                <p class="text-gray-700 italic mb-4">Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts.</p>
                <div class="font-bold">Rodel Golez</div>
                <span class="text-sm text-gray-500">Businesswoman</span>
            </div>
            <div class="bg-white rounded-lg p-6 shadow text-center flex flex-col items-center">
                <img src="images/person_1.jpg" class="w-20 h-20 rounded-full mb-4" alt="Ken Bosh" />
                <p class="text-gray-700 italic mb-4">Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts.</p>
                <div class="font-bold">Ken Bosh</div>
                <span class="text-sm text-gray-500">Businesswoman</span>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto grid md:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="w-full h-64 bg-cover bg-center rounded mb-4"
                style="background-image: url('images/about.jpg');"></div>
            <h2 class="text-2xl font-bold mb-2">The most recommended vacation rental</h2>
            <p class="text-gray-600">A small river named Duden flows by their place and supplies it with the necessary
                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even
                the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One
                day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                Grammar.</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-bold mb-2">What we offer</h3>
            <ul class="list-disc pl-5 text-gray-600">
                <li>Tea Coffee</li>
                <li>Hot Showers</li>
                <li>Laundry</li>
                <li>Air Conditioning</li>
                <li>Free Wifi</li>
                <li>Kitchen</li>
                <li>Ironing</li>
                <li>Lockers</li>
            </ul>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="relative py-16 bg-emerald-600 text-white text-center"
    style="background-image: url('images/bg_1.jpg'); background-size: cover; background-position: center;">
    <div class="bg-black bg-opacity-40 py-16 ">
        <h2 class="text-3xl font-bold mb-4">Ready to get started</h2>
        <p class="mb-6">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
        <a href="#" class="btn-primary px-8 py-4">Book now</a>
        <a href="#" class="btn-white px-8 py-4 ml-4">Contact us</a>
    </div>
</section>

<!-- Blog Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-2">Latest news from our blog</h2>
        <span class="block text-lg text-gray-500 text-center mb-10">News &amp; Blog</span>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-100 rounded-lg p-6 shadow">
                <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                    style="background-image: url('images/image_1.jpg');"></div>
                <h3 class="text-xl font-bold mb-2">Work Hard, Party Hard in a Luxury Chalet in the Alps</h3>
                <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                    <span>January 30, 2020</span>
                    <span>Admin</span>
                    <span><span class="fa fa-comment"></span> 3</span>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-6 shadow">
                <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                    style="background-image: url('images/image_2.jpg');"></div>
                <h3 class="text-xl font-bold mb-2">Work Hard, Party Hard in a Luxury Chalet in the Alps</h3>
                <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                    <span>January 30, 2020</span>
                    <span>Admin</span>
                    <span><span class="fa fa-comment"></span> 3</span>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-6 shadow">
                <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                    style="background-image: url('images/image_3.jpg');"></div>
                <h3 class="text-xl font-bold mb-2">Work Hard, Party Hard in a Luxury Chalet in the Alps</h3>
                <div class="text-sm text-gray-500 mb-2 flex gap-2 justify-center">
                    <span>January 30, 2020</span>
                    <span>Admin</span>
                    <span><span class="fa fa-comment"></span> 3</span>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
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
        <div class="text-sm">&copy; {{ date('Y') }} Vacation Rental. All rights reserved.</div>
        <div class="text-sm md:text-right">Designed by Daniel Mwangi</div>
    </div>
</footer>
<!-- Loader -->
{{-- <div id="ftco-loader" class="show fullscreen flex items-center justify-center"><svg class="circular" width="48px"
        height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div> --}}
