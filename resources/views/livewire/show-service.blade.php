    <div wire:loading.remove class="grid lg:grid-cols-3 gap-8">
      <!-- Suite 1 -->
      <div class="bg-white rounded-md overflow-hidden shadow-lg luxury-card transition-all duration-300 group">
        <div class="h-72 overflow-hidden relative">
          <img class="w-full h-full object-cover group-hover:scale-105 transition duration-700" src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}">
          <div class="absolute top-4 right-4 bg-amber-800/90 text-white px-3 py-1 text-xs font-semibold rounded-full">Most Exclusive</div>
        </div>
        <div class="p-6">
          <h3 class="text-2xl font-semibold serif-heading">The Presidential View</h3>
          <p class="text-stone-500 text-sm mt-1">120 sqm · Private terrace · Outdoor jacuzzi</p>
          <p class="mt-3 text-stone-600">Floor-to-ceiling windows facing Lake Nakuru National Park. King bed, marble bath, and dedicated concierge.</p>
          <div class="mt-5 flex justify-between items-center border-t pt-4 border-stone-200">
            <span class="text-2xl font-bold text-amber-800">$490<span class="text-sm font-normal text-stone-500">/night</span></span>
            <a href="#contact" class="text-amber-700 font-semibold hover:text-amber-900 flex items-center gap-1">Book now <i class="fas fa-arrow-right text-xs"></i></a>
          </div>
        </div>
      </div>


    </div>