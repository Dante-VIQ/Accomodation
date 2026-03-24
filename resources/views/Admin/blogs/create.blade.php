@extends('layouts.admin')

@section('title', 'Add Blog Post')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Add New Blog Post</h1>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Image *</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2" accept="image/*" required>
            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded-lg px-3 py-2" required>
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Body *</label>
            <textarea name="body" rows="12" class="w-full border rounded-lg px-3 py-2" required>{{ old('body') }}</textarea>
            @error('body') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg">Publish Post</button>
            <a href="{{ route('blogs.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection