<div x-data="{ open: false }" x-cloak class="relative lg:hidden flex">

    <!-- Trigger -->
    <button @click="open = true" x-on:click.outside.prevent="{ open: false }"
        class="px-4 py-2 bg-teal-600 text-white rounded-lg shadow lg:hidden">
        Book Now
    </button>

    <!-- Modal Background -->
    <div x-show="open" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" 
        @keydown.escape.window="open = false">

        <!-- Modal Content -->
        <div class="bg-white w-full max-w-2xl p-8 rounded-xl shadow-lg relative">
            <!-- Close Button -->
            <button @click="open = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-black text-2xl font-bold p-4">
                ✕
            </button>

            <!-- Form -->
            <form wire:submit.prevent="submit" class="space-y-6">

                <h3 class="text-2xl font-semibold mb-4">Book your apartment</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <input type="text" wire:model="full_name" class="input w-full" placeholder="Full Name">
                    @error('full_name')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="text" wire:model="phone" class="input w-full" placeholder="Phone number">
                    @error('phone')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="date" wire:model="check_in" class="input" placeholder="Check-In">
                    @error('check_in')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="date" wire:model="check_out" class="input" placeholder="Check-Out">
                    @error('check_out')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <select wire:model="adults" class="input w-full">
                        <option value="">Adults</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('adults')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <select wire:model="children" class="input w-full">
                        <option value="">Children</option>
                        @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('children')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <select wire:model="room_id" class="input w-full">
                        <option value="">Select Room</option>
                        @foreach (\App\Models\Room::all() as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="text" wire:model="time" class="input w-full" placeholder="Time (optional)">
                    @error('time')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <button type="submit" class="w-full py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700">
                    Book Apartment Now
                </button>

            </form>
        </div>
    </div>
</div>
