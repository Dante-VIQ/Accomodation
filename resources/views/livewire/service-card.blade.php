  @if ($this->services && $this->services->count() > 0)
      <section class="relative -mt-28 p-8">
          <div class="container mx-auto grid md:grid-cols-3 gap-8 z-90">
              @foreach ($services as $service)
                  <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
                      <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                          style="background-image: url('{{ asset('storage/' . $service->image) }}');"></div>
                      <h3 class="text-xl font-bold mb-2">{{ $service->title }}</h3>
                      <p class="text-gray-600">{{ $service->description }}</p>
                      <a href="#" class="btn-primary mt-4">Read more</a>
                  </div>
              @endforeach
          </div>
      </section>
  @else
      <section class="relative -mt-28 p-8">
          <div class="container mx-auto grid md:grid-cols-3 gap-8 z-90">
              <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
                  <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                      style="background-image: url('images/services-1.jpg');"></div>
                  <h3 class="text-xl font-bold mb-2">Map Direction</h3>
                  <p class="text-gray-600">Even the all-powerful Pointing has no control about the blind texts it is an
                      almost
                      unorthographic.</p>
                  <a href="#" class="btn-primary mt-4">Read more</a>
              </div>
              <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
                  <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                      style="background-image: url('images/services-2.jpg');"></div>
                  <h3 class="text-xl font-bold mb-2">Accomodation Services</h3>
                  <p class="text-gray-600">Even the all-powerful Pointing has no control about the blind texts it is an
                      almost
                      unorthographic.</p>
                  <a href="#" class="btn-primary mt-4">Read more</a>
              </div>
              <div class="bg-white rounded-lg shadow p-6 text-center flex flex-col items-center">
                  <div class="w-full h-48 bg-cover bg-center rounded mb-4"
                      style="background-image: url('images/services-3.jpg');"></div>
                  <h3 class="text-xl font-bold mb-2">Great Experience</h3>
                  <p class="text-gray-600">Even the all-powerful Pointing has no control about the blind texts it is an
                      almost
                      unorthographic.</p>
                  <a href="#" class="btn-primary mt-4">Read more</a>
              </div>
          </div>
      </section>
  @endif
