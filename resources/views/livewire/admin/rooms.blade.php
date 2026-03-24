<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Rooms</h1>
        <button wire:click="create" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg">Add New Room</button>
    </div>

    @if(session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    @if($showForm)
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">{{ $editingId ? 'Edit Room' : 'Create Room' }}</h2>
        <form wire:submit.prevent="save" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                    <input type="text" wire:model="name" class="w-full border rounded-lg px-3 py-2">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <input type="text" wire:model="type" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price * (Ksh)</label>
                    <input type="number" wire:model="price" class="w-full border rounded-lg px-3 py-2">
                    @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <input type="text" wire:model="category" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                    <input type="text" wire:model="size" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Capacity (persons)</label>
                    <input type="number" wire:model="capacity" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bed Type</label>
                    <input type="text" wire:model="bed_type" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Badge (e.g., Popular)</label>
                    <input type="text" wire:model="badge" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Best Season</label>
                    <input type="text" wire:model="best_season" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                    <input type="number" wire:model="display_order" class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="flex items-center gap-2 mt-2">
                        <input type="checkbox" wire:model="is_popular" class="rounded"> Popular
                    </label>
                    <label class="flex items-center gap-2 mt-2">
                        <input type="checkbox" wire:model="is_featured" class="rounded"> Featured
                    </label>
                    <label class="flex items-center gap-2 mt-2">
                        <input type="checkbox" wire:model="is_active" class="rounded"> Active
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                <textarea wire:model="description" rows="3" class="w-full border rounded-lg px-3 py-2"></textarea>
                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Amenities (comma separated)</label>
                <input type="text" wire:model="amenities" placeholder="Wi-Fi, Air Conditioning, Mini Bar" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Images</label>
                <input type="file" wire:model="tempImages" multiple class="w-full border rounded-lg px-3 py-2">
                @error('tempImages.*') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($existingImages as $index => $img)
                        <div class="relative">
                            <img src="{{ Storage::url($img) }}" class="h-20 w-20 object-cover rounded">
                            <button type="button" wire:click="removeExistingImage({{ $index }})" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">×</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg">Save</button>
                <button type="button" wire:click="cancel" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">Cancel</button>
            </div>
        </form>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($rooms as $room)
                <tr>
                    <td class="px-6 py-4">{{ $room->id }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ Storage::url($room->image ?? 'rooms/default.jpg') }}" class="h-12 w-12 object-cover rounded">
                    </td>
                    <td class="px-6 py-4">{{ $room->name }}</td>
                    <td class="px-6 py-4">Ksh. {{ number_format($room->price, 0) }}</td>
                    <td class="px-6 py-4">{{ $room->category ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full {{ $room->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $room->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="edit({{ $room->id }})" class="text-blue-600 hover:underline mr-2">Edit</button>
                        <button wire:click="delete({{ $room->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $rooms->links() }}</div>
</div>