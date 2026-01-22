<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('images/hero1.png');">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2 mx-auto">
        <div class="container h-full flex relative z-10 p-20 justify-between">
            <div class="w-full max-w-4xl">
                <h2 class="sm:text-xl text-lg font-light mb-2 text-white">Welcome to VillaVeh GameView</h2>
                <h1 class="sm:text-4xl text-2xl font-bold mb-6 text-white">Book an appartment for your vacation</h1>
                <div class="flex flex-wrap sm:gap-4 gap-2">
                    {{-- <a href="#" class="hidden sm:flex btn-primary mr-4 text-white">Learn more</a> --}}
                    <a href="/book"
                        class="px-6 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">
                        Book Now
                    </a>
                    <a href="/contact" class="btn-white">Contact us</a>
                </div>
            </div>
        </div>
        <div class="hidden container mx-auto lg:flex justify-end p-10">
            <div class="w-full max-w-lg bg-gray-50 rounded-lg shadow p-8 justify-end bg-opacity-70 relative z-10">
                <form wire:submit.prevent="save" class="space-y-6">
                    <h3 class="text-2xl font-semibold mb-4">Book your apartment</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" wire:model="full_name" class="input" placeholder="Full Name">
                            @error('full_name')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <input type="text" wire:model="phone" class="input" placeholder="Phone number">
                            @error('phone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <input type="date" wire:model="check_in" class="input" placeholder="Check-In">
                            @error('check_in')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <input type="date" wire:model="check_out" class="input" placeholder="Check-Out">
                            @error('check_out')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <select wire:model="adults" class="input">
                                <option value="">Adults</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('adults')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <select wire:model="children" class="input">
                                <option value="">Children</option>
                                @for ($i = 0; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('children')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <select wire:model="room_id" class="input">
                                <option value="">Select Room</option>
                                @foreach (\App\Models\Room::all() as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>

                            @error('room_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <input type="text" wire:model="time" class="input" placeholder="Time (optional)">
                            @error('time')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>

                    <button type="submit" class="btn-primary w-full py-3 bg-teal-600 text-white rounded-lg">
                        Book Apartment Now
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
