
<div x-data="aboutPage()" x-init="init()" class="bg-[#FDF9F3]">
    
    {{-- Hero Section --}}
    <section class="relative h-[60vh] min-h-[500px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
             style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.7)), url('https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1600');">
        <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
            <span class="inline-block px-4 py-1 border border-amber-300/50 rounded-full text-amber-100 text-sm tracking-wider mb-4 backdrop-blur-sm">
                ✦ OUR LEGACY ✦
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight font-['Cormorant_Garamond']">
                Where <span class="text-amber-300">Luxury</span> Meets<br>Wild Heart
            </h1>
            <p class="text-lg md:text-xl mt-4 max-w-2xl mx-auto text-amber-50/90">
                A story of passion, conservation, and unparalleled hospitality in the heart of Nakuru.
            </p>
        </div>
    </section>

    {{-- Our Story Section --}}
    <section class="py-20 md:py-28">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                             alt="Villaveh Gameview Estate" 
                             class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-amber-700 text-white p-4 rounded-lg shadow-xl hidden md:block">
                        <div class="text-3xl font-bold">Est. 2018</div>
                        <div class="text-sm">Luxury Redefined</div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <span class="text-amber-700 font-semibold tracking-widest text-sm uppercase">— Our Journey —</span>
                    <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-3 mb-6 text-stone-800">
                        A Vision Born from Nature's Majesty
                    </h2>
                    <div class="space-y-4 text-stone-600 leading-relaxed">
                        <p>Villaveh Gameview was born from a simple yet profound dream: to create a sanctuary where luxury and nature exist in perfect harmony. In 2018, our founder, James Villaveh, envisioned a place where discerning travelers could experience the raw beauty of the African wilderness without compromising on elegance and comfort.</p>
                        <p>Perched on the slopes overlooking Lake Nakuru National Park, our estate captures the essence of Kenya's Great Rift Valley. What began as a family retreat has blossomed into one of Nakuru's most coveted luxury BnB destinations, welcoming guests from around the globe to experience authentic Kenyan hospitality.</p>
                        <p>Today, Villaveh Gameview stands as a testament to sustainable luxury — a place where every detail, from our architecture to our service, reflects our deep respect for the land and its magnificent wildlife.</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="border-l-4 border-amber-600 pl-4">
                            <div class="text-2xl font-bold text-amber-800">500+</div>
                            <div class="text-sm text-stone-500">Happy Guests Yearly</div>
                        </div>
                        <div class="border-l-4 border-amber-600 pl-4">
                            <div class="text-2xl font-bold text-amber-800">50+</div>
                            <div class="text-sm text-stone-500">Wildlife Species</div>
                        </div>
                        <div class="border-l-4 border-amber-600 pl-4">
                            <div class="text-2xl font-bold text-amber-800">15+</div>
                            <div class="text-sm text-stone-500">Award-Winning Services</div>
                        </div>
                        <div class="border-l-4 border-amber-600 pl-4">
                            <div class="text-2xl font-bold text-amber-800">100%</div>
                            <div class="text-sm text-stone-500">Eco-Friendly Practices</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Values Section --}}
    <section class="py-20 bg-stone-100">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-amber-700 font-semibold tracking-widest text-sm uppercase">✦ Our Philosophy ✦</span>
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-3 mb-6 text-stone-800">
                    Principles That Guide Us
                </h2>
                <p class="text-stone-600">At the heart of Villaveh Gameview lies a commitment to excellence, sustainability, and genuine human connection.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-leaf text-3xl text-amber-700"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Sustainable Luxury</h3>
                    <p class="text-stone-600 text-sm">We're committed to eco-friendly practices, from solar energy to water conservation, ensuring we protect the environment we cherish.</p>
                </div>
                
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-3xl text-amber-700"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Authentic Hospitality</h3>
                    <p class="text-stone-600 text-sm">Every guest becomes family. Our warm Kenyan welcome and personalized service create unforgettable connections.</p>
                </div>
                
                <div class="bg-white rounded-xl p-8 text-center shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-paw text-3xl text-amber-700"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Wildlife Conservation</h3>
                    <p class="text-stone-600 text-sm">We actively support local conservation efforts and educate guests about preserving Kenya's incredible biodiversity.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- The Villaveh Experience Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold tracking-widest text-sm uppercase">— The Experience —</span>
                    <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-3 mb-6 text-stone-800">
                        More Than Just a Stay
                    </h2>
                    <p class="text-stone-600 mb-6 leading-relaxed">At Villaveh Gameview, we believe true luxury lies in the details. From the moment you arrive, you're enveloped in an atmosphere of understated elegance and warm Kenyan hospitality.</p>
                    
                    <div class="space-y-4">
                        <div class="flex gap-4 items-start">
                            <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-wine-glass-alt text-amber-700 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-800">Welcome Ritual</h4>
                                <p class="text-stone-500 text-sm">Champagne welcome and traditional Kenyan refreshments upon arrival.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-binoculars text-amber-700 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-800">Wildlife Viewing Decks</h4>
                                <p class="text-stone-500 text-sm">Strategically positioned decks for optimal wildlife spotting throughout the day.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-utensils text-amber-700 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-800">Gastronomic Journey</h4>
                                <p class="text-stone-500 text-sm">Farm-to-table dining with locally sourced ingredients and international flair.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-hands-helping text-amber-700 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-800">Personalized Concierge</h4>
                                <p class="text-stone-500 text-sm">Tailored experiences from private safaris to cultural encounters.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <img src="https://images.pexels.com/photos/2609220/pexels-photo-2609220.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                 alt="Luxury Dining" 
                                 class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <img src="https://images.pexels.com/photos/2253839/pexels-photo-2253839.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                 alt="Spa Treatment" 
                                 class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <img src="https://images.pexels.com/photos/1462979/pexels-photo-1462979.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                 alt="Safari Experience" 
                                 class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <img src="https://images.pexels.com/photos/1648776/pexels-photo-1648776.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                 alt="Luxury Suite" 
                                 class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Meet Our Team Section (Interactive Alpine.js) --}}
    <section class="py-20 bg-gradient-to-br from-stone-900 to-stone-800 text-white">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center mb-12">
                <span class="text-amber-400 tracking-wider text-sm uppercase">✦ The Heart of Villaveh ✦</span>
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-2">Meet Our Family</h2>
                <p class="text-stone-300 mt-3 max-w-2xl mx-auto">The passionate individuals who make every stay extraordinary with their warmth and expertise.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <template x-for="member in teamMembers" :key="member.id">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl overflow-hidden hover:bg-white/20 transition-all duration-300 cursor-pointer"
                         @click="showTeamMember(member)">
                        <div class="relative h-64 overflow-hidden">
                            <img :src="member.image" :alt="member.name" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute bottom-4 left-4">
                                <div class="text-white">
                                    <p class="font-semibold text-lg" x-text="member.name"></p>
                                    <p class="text-sm text-amber-300" x-text="member.role"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    {{-- Team Member Modal --}}
    <div x-show="teamModalOpen" 
         x-transition.opacity.duration.300ms
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm overflow-y-auto"
         x-cloak>
        <div class="bg-white rounded-2xl max-w-3xl w-full relative"
             x-show="teamModalOpen"
             x-transition.scale.origin.center.duration.300ms
             @click.away="teamModalOpen = false">
            <button @click="teamModalOpen = false" class="absolute top-4 right-4 text-stone-400 hover:text-stone-800 text-2xl z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="grid md:grid-cols-2 gap-0">
                <div class="h-80 md:h-full">
                    <img :src="selectedMember?.image" :alt="selectedMember?.name" class="w-full h-full object-cover rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none">
                </div>
                <div class="p-6 md:p-8">
                    <h2 class="text-2xl font-semibold font-['Cormorant_Garamond'] text-stone-800" x-text="selectedMember?.name"></h2>
                    <p class="text-amber-700 font-medium mb-4" x-text="selectedMember?.role"></p>
                    <p class="text-stone-600 leading-relaxed" x-text="selectedMember?.bio"></p>
                    
                    <div class="mt-6">
                        <h4 class="font-semibold text-stone-800 mb-2">Fun Fact</h4>
                        <p class="text-stone-500 text-sm italic" x-text="selectedMember?.funFact"></p>
                    </div>
                    
                    <div class="mt-6 flex gap-3">
                        <a :href="selectedMember?.linkedin" target="_blank" class="text-stone-400 hover:text-amber-700 transition">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a :href="selectedMember?.twitter" target="_blank" class="text-stone-400 hover:text-amber-700 transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sustainability & Conservation Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <img src="https://images.pexels.com/photos/2442906/pexels-photo-2442906.jpeg?auto=compress&cs=tinysrgb&w=800" 
                         alt="Conservation Efforts" 
                         class="rounded-2xl shadow-2xl w-full">
                </div>
                <div class="order-1 lg:order-2">
                    <span class="text-amber-700 font-semibold tracking-widest text-sm uppercase">✦ Our Commitment ✦</span>
                    <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-3 mb-6 text-stone-800">
                        Protecting Nature's Legacy
                    </h2>
                    <p class="text-stone-600 mb-6 leading-relaxed">We believe luxury travel should leave a positive impact. Through our partnership with local conservation organizations, we actively contribute to preserving the unique ecosystem of Lake Nakuru and its surrounding areas.</p>
                    
                    <div class="space-y-4">
                        <div class="flex gap-3 items-start">
                            <i class="fas fa-tree text-amber-600 mt-1"></i>
                            <div>
                                <span class="font-semibold">Tree Planting Initiative:</span>
                                <span class="text-stone-500 text-sm"> 500+ trees planted annually in partnership with local communities.</span>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start">
                            <i class="fas fa-water text-amber-600 mt-1"></i>
                            <div>
                                <span class="font-semibold">Water Conservation:</span>
                                <span class="text-stone-500 text-sm"> Rainwater harvesting and greywater recycling systems throughout the property.</span>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start">
                            <i class="fas fa-solar-panel text-amber-600 mt-1"></i>
                            <div>
                                <span class="font-semibold">Renewable Energy:</span>
                                <span class="text-stone-500 text-sm"> 70% of our energy needs met through solar power.</span>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start">
                            <i class="fas fa-hand-holding-heart text-amber-600 mt-1"></i>
                            <div>
                                <span class="font-semibold">Community Support:</span>
                                <span class="text-stone-500 text-sm"> Employing local talent and supporting nearby schools and health initiatives.</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 p-4 bg-amber-50 rounded-lg border-l-4 border-amber-600">
                        <p class="text-stone-700 text-sm italic">"We don't inherit the earth from our ancestors; we borrow it from our children. Every stay at Villaveh contributes to preserving this paradise for generations to come."</p>
                        <p class="text-amber-700 text-sm font-semibold mt-2">— James Villaveh, Founder</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Awards & Recognition --}}
    <section class="py-20 bg-stone-100">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center mb-12">
                <span class="text-amber-700 tracking-wider text-sm uppercase">✦ Excellence Recognized ✦</span>
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-2">Awards & Accolades</h2>
                <p class="text-stone-500 mt-3">Our commitment to excellence has been recognized by leading travel authorities.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <i class="fas fa-trophy text-4xl text-amber-600 mb-3"></i>
                    <h3 class="font-bold text-stone-800">TripAdvisor</h3>
                    <p class="text-sm text-stone-500">Travelers' Choice 2024</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <i class="fas fa-star text-4xl text-amber-600 mb-3"></i>
                    <h3 class="font-bold text-stone-800">Luxury Travel Guide</h3>
                    <p class="text-sm text-stone-500">Best Boutique BnB Kenya</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <i class="fas fa-leaf text-4xl text-amber-600 mb-3"></i>
                    <h3 class="font-bold text-stone-800">Eco-Luxury Award</h3>
                    <p class="text-sm text-stone-500">Sustainable Tourism 2023</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md">
                    <i class="fas fa-wine-glass-alt text-4xl text-amber-600 mb-3"></i>
                    <h3 class="font-bold text-stone-800">Wine Spectator</h3>
                    <p class="text-sm text-stone-500">Award of Excellence</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Location & Heritage Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-amber-700 tracking-wider text-sm uppercase">✦ The Land We Call Home ✦</span>
                <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mt-2 mb-6">Nakuru's Crown Jewel</h2>
                <p class="text-stone-600 leading-relaxed mb-8">Nestled in the heart of the Great Rift Valley, our property offers unparalleled views of Lake Nakuru, known worldwide for its millions of flamingos and diverse wildlife. This region has been a sanctuary for generations, and we're honored to share its beauty with our guests.</p>
            </div>
            
            <div class="rounded-2xl overflow-hidden shadow-2xl">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63887.25827858878!2d36.03294210957506!3d-0.2908920926861726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1829a4ea0d2fbb37%3A0x7cd19b8288a7d08f!2sLake%20Nakuru!5e0!3m2!1sen!2ske!4v1700000000000!5m2!1sen!2ske" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                <div class="text-center p-4">
                    <i class="fas fa-binoculars text-2xl text-amber-600 mb-2"></i>
                    <p class="text-sm text-stone-600">15-min drive to Lake Nakuru National Park</p>
                </div>
                <div class="text-center p-4">
                    <i class="fas fa-plane text-2xl text-amber-600 mb-2"></i>
                    <p class="text-sm text-stone-600">2.5 hours from Nairobi by road</p>
                </div>
                <div class="text-center p-4">
                    <i class="fas fa-mountain text-2xl text-amber-600 mb-2"></i>
                    <p class="text-sm text-stone-600">Elevation: 1,800m above sea level</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Join Our Journey CTA --}}
    <section class="py-20 bg-gradient-to-r from-amber-800 to-amber-900 text-white">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <h2 class="text-3xl md:text-4xl font-['Cormorant_Garamond'] font-semibold mb-4">Become Part of Our Story</h2>
            <p class="text-amber-100 max-w-2xl mx-auto mb-8">Whether you're planning your first visit or returning to create new memories, we can't wait to welcome you to Villaveh Gameview.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="inline-flex items-center gap-2 bg-white text-amber-800 hover:bg-stone-100 px-8 py-4 rounded-lg transition font-semibold text-lg shadow-xl">
                    <i class="fas fa-calendar-alt"></i> Book Your Stay
                </a>
                <a href="/rooms" class="inline-flex items-center gap-2 border-2 border-white text-white hover:bg-white/10 px-8 py-4 rounded-lg transition font-semibold text-lg">
                    <i class="fas fa-eye"></i> Explore Our Suites
                </a>
            </div>
        </div>
    </section>
</div>

{{-- Alpine.js Component Script --}}
<script>
    function aboutPage() {
        return {
            teamModalOpen: false,
            selectedMember: null,
            
            teamMembers: [
                {
                    id: 1,
                    name: 'Veronicah Villaveh',
                    role: 'Founder & Owner',
                    image: 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=600',
                    bio: 'With over 20 years of experience in luxury hospitality, James founded Villaveh Gameview to share his passion for Kenyan wildlife and culture. His vision combines authentic experiences with world-class comfort.',
                    funFact: 'James is a licensed safari guide and has personally led over 500 game drives in Lake Nakuru National Park.',
                    linkedin: '#',
                    twitter: '#'
                },
                {
                    id: 2,
                    name: 'Elijah Mwangi',
                    role: 'General Manager',
                    image: 'https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=600',
                    bio: 'Grace brings 15 years of luxury hotel management experience to Villaveh. Her attention to detail and genuine warmth ensure every guest feels like family.',
                    funFact: 'Grace is a certified sommelier and curates our exclusive wine collection featuring over 200 labels.',
                    linkedin: '#',
                    twitter: '#'
                },
                {
                    id: 3,
                    name: 'David Ochieng',
                    role: 'Head Chef',
                    image: 'https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&w=600',
                    bio: 'David combines traditional Kenyan flavors with international culinary techniques. His farm-to-table philosophy showcases the best of local ingredients.',
                    funFact: 'David trained at Le Cordon Bleu in Paris and has cooked for two former presidents.',
                    linkedin: '#',
                    twitter: '#'
                },
                {
                    id: 4,
                    name: 'Sarah Kamau',
                    role: 'Safari & Concierge Manager',
                    image: 'https://images.pexels.com/photos/1181690/pexels-photo-1181690.jpeg?auto=compress&cs=tinysrgb&w=600',
                    bio: 'Sarah designs bespoke itineraries that create unforgettable wildlife experiences. Her knowledge of local flora and fauna is unparalleled.',
                    funFact: 'Sarah can identify over 200 bird species by their calls and has been featured in National Geographic.',
                    linkedin: '#',
                    twitter: '#'
                }
            ],
            
            init() {
                // Any initialization logic
            },
            
            showTeamMember(member) {
                this.selectedMember = member;
                this.teamModalOpen = true;
            }
        }
    }
</script>
