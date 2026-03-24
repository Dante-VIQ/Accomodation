@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Service: {{ $service->name }}</h1>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>
            <img src="{{ Storage::url($service->image) }}" class="h-32 w-auto object-cover rounded mb-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Replace Image</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2" accept="image/*">
            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Image *</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2" accept="image/*" required>
            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg px-3 py-2" required>
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2" required>{{ old('description') }}</textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <input type="text" name="category" value="{{ old('category') }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price Unit</label>
                <input type="text" name="price_unit" value="{{ old('price_unit', '/person') }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                <input type="text" name="duration" value="{{ old('duration') }}" placeholder="e.g., 2 hours" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Group Size</label>
                <input type="number" name="group_size" value="{{ old('group_size') }}" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                <input type="number" name="display_order" value="{{ old('display_order', 0) }}" class="w-full border rounded-lg px-3 py-2">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Features (comma separated)</label>
            <input type="text" name="features" value="{{ old('features') }}" placeholder="Wi-Fi, Breakfast included, Parking" class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Description (optional)</label>
            <textarea name="full_description" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('full_description') }}</textarea>
        </div>

        <div class="mb-4 flex gap-4">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}> Popular
            </label>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}> Active
            </label>
        </div>

    </form>
</div>
@endsection