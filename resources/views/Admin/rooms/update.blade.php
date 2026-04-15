@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Room</h2>
    <form action="{{ route('rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                <input type="text" name="name" value="{{ old('name', $room->name) }}" class="w-full border rounded-lg px-3 py-2 @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <input type="text" name="type" value="{{ old('type', $room->type) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price * (Ksh)</label>
                <input type="number" name="price" value="{{ old('price', $room->price) }}" class="w-full border rounded-lg px-3 py-2 @error('price') border-red-500 @enderror">
                @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <input type="text" name="category" value="{{ old('category', $room->category) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                <input type="text" name="size" value="{{ old('size', $room->size) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Capacity (persons)</label>
                <input type="number" name="capacity" value="{{ old('capacity', $room->capacity) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bed Type</label>
                <input type="text" name="bed_type" value="{{ old('bed_type', $room->bed_type) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Badge</label>
                <input type="text" name="badge" value="{{ old('badge', $room->badge) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Best Season</label>
                <input type="text" name="best_season" value="{{ old('best_season', $room->best_season) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                <input type="number" name="display_order" value="{{ old('display_order', $room->display_order) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div class="flex flex-col gap-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $room->is_popular) ? 'checked' : '' }}> Popular
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $room->is_featured) ? 'checked' : '' }}> Featured
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $room->is_active) ? 'checked' : '' }}> Active
                </label>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
            <textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description', $room->description) }}</textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Amenities (comma separated)</label>
            <input type="text" name="amenities" value="{{ old('amenities', $room->amenities_string) }}" placeholder="Wi-Fi, Air Conditioning, Mini Bar" class="w-full border rounded-lg px-3 py-2">
        </div>

        <!-- Existing Images -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>
            <div class="flex flex-wrap gap-3">
                @foreach($room->images ?? [] as $index => $image)
                    <div class="relative">
                        <img src="{{ Storage::url($image) }}" class="h-20 w-20 object-cover rounded border">
                        <label class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs cursor-pointer">
                            <input type="checkbox" name="existing_images[]" value="{{ $image }}" class="hidden" onchange="this.parentElement.style.backgroundColor = this.checked ? '#dc2626' : '#ef4444'">
                            ×
                        </label>
                    </div>
                @endforeach
            </div>
            <p class="text-xs text-gray-500 mt-1">Click the × on any image to mark it for deletion (then save).</p>
        </div>

        <!-- New Images Upload -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Add New Images</label>
            <input type="file" name="images[]" multiple class="w-full border rounded-lg px-3 py-2">
            <div id="new-image-preview" class="flex flex-wrap gap-2 mt-2"></div>
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg">Update Room</button>
            <a href="{{ route('admin.rooms.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Preview for new images
    document.querySelector('input[name="images[]"]').addEventListener('change', function(e) {
        const preview = document.getElementById('new-image-preview');
        preview.innerHTML = '';
        for (let file of e.target.files) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const img = document.createElement('img');
                img.src = ev.target.result;
                img.classList.add('h-20', 'w-20', 'object-cover', 'rounded', 'border');
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush