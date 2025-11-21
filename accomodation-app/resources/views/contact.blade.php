<x-guest-layout>
    <section class="relative bg-cover bg-opacity-50 bg-no-repeat h-[60vh]"
        style="background-image: url('images/bg_2.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="grid lg:grid-cols-1 grid-cols-1 gap-2 mx-auto">
            <div class="container h-full flex relative z-10 p-20 justify-center">
                <div class="w-full max-w-4xl text-white">
                    <h2 class="text-2xl text-gray-200 mb-2">VillaVeh CustomerCare</h2>
                    <h1 class="text-4xl sm:text-2xl text-gray-200 font-bold mb-6">Get in touch with our experienced Customer Support.</h1>
                    <div x-data="{ open: false }" class="lg:flex block space-x-4">
                        {{-- <a href="#" class="hidden sm:flex btn-primary">Learn more</a> --}}
                        <button type="submit" class=" sm:flex block btn-primary">
                            Book Now
                        </button>
                        <a href="#" class="btn-white">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   	<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-8">
    				<div id="map" class="map"></div>
    			</div>
    			<div class="col-md-4 p-4 p-md-5 bg-white">
    				<h2 class="font-weight-bold mb-4">Lets get started</h2>
    				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
    				<p><a href="#" class="btn btn-primary">Book Apartment Now</a></p>
    			</div>
					<div class="col-md-12">
						<div class="wrapper">
							<div class="row no-gutters">
								<div class="col-lg-8 col-md-7 d-flex align-items-stretch">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Get in touch</h3>
										<div id="form-message-warning" class="mb-4"></div>
					      		<div id="form-message-success" class="mb-4">
					            Your message was sent, thank you!
					      		</div>
										<form method="POST" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Full Name</label>
														<input type="text" class="form-control" name="name" id="name" placeholder="Name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="Email">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="subject">Subject</label>
														<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Message</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Send Message" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
									<div class="info-wrap bg-primary w-100 p-md-5 p-4">
										<h3>Let's get in touch</h3>
										<p class="mb-4">We're open for any suggestion or just to have a chat</p>
					        	<div class="dbox w-100 d-flex align-items-start">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-map-marker"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
						          </div>
					          </div>
					        	<div class="dbox w-100 d-flex align-items-center">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-phone"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
						          </div>
					          </div>
					        	<div class="dbox w-100 d-flex align-items-center">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-paper-plane"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
						          </div>
					          </div>
					        	<div class="dbox w-100 d-flex align-items-center">
					        		<div class="icon d-flex align-items-center justify-content-center">
					        			<span class="fa fa-globe"></span>
					        		</div>
					        		<div class="text pl-3">
						            <p><span>Website</span> <a href="#">yoursite.com</a></p>
						          </div>
					          </div>
				          </div>
								</div>
							</div>
						</div>
					</div>
				</div>
    	</div>
    </section>

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
            <div class="text-sm md:text-right">Designed by VillaVeroh</div>
        </div>
    </footer>
</x-guest-layout>
