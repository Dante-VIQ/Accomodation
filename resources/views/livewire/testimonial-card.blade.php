<div x-data="{ open: false }" class="relative z-50">

    <!-- BUTTON THAT OPENS MODAL -->
    @if($can_submit)
        <button @click="open = true" class="bg-indigo-600 text-white px-6 py-2 rounded-lg">
            Leave a Testimonial
        </button>
    @else
        <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg inline-block">Login to Leave a Testimonial</a>
    @endif

    <!-- MODAL BACKDROP -->
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
        x-transition.opacity>

        <!-- MODAL CONTENT -->
        <div x-show="open" x-transition @click.away="open = false"
            class="bg-white p-6 rounded-lg shadow-xl w-full max-w-lg">

            <button @click="open = false" class="absolute top-3 right-4 text-gray-500">
                ✕
            </button>

            <h2 class="text-xl font-semibold mb-4">Share Your Experience</h2>

            <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">

                @if (session()->has('success'))
                    <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="submit" class="space-y-4">

                    <!-- Name -->
                    <div>
                        <label class="block font-semibold mb-1">Your Name</label>
                        <input type="text" wire:model="name"
                            class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" />
                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="block font-semibold mb-1">Your Role (optional)</label>
                        <input type="text" wire:model="role" class="w-full border-gray-300 rounded-lg" />
                        @error('role')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block font-semibold mb-1">Your Testimonial</label>
                        <textarea wire:model="message" rows="4" class="w-full border-gray-300 rounded-lg"></textarea>
                        @error('message')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Avatar Upload -->
                    <div>
                        <label class="block font-semibold mb-1">Profile Photo (optional)</label>
                        <input type="file" wire:model="avatar" class="block w-full" />

                        @if ($avatar)
                            <img src="{{ $avatar->temporaryUrl() }}" class="w-20 h-20 rounded-full mt-2">
                        @endif

                        @error('avatar')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg">
                        Submit Testimonial
                    </button>
                </form>
            </div>


        </div>
    </div>
</div>
