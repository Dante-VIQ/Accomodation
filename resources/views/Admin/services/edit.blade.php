<x-admin-layout>

    <h1 class="text-2xl font-bold mb-6">Edit Service</h1>

    <form action="{{ route('admin.services.update', $service) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 max-w-xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Current Image</label>
            <img src="{{ asset('storage/' . $service->image) }}"
                 class="w-40 h-40 object-cover rounded-lg mt-2">
        </div>

        <div>
            <label class="block font-medium">Replace Image (Optional)</label>
            <input type="file" name="image" class="mt-2 border rounded-lg p-2 w-full">
            @error('image') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Service Name</label>
            <input type="text"
                   name="name"
                   value="{{ $service->name }}"
                   class="mt-2 border rounded-lg p-2 w-full">
            @error('name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description"
                      rows="4"
                      class="mt-2 border rounded-lg p-2 w-full">{{ $service->description }}</textarea>
            @error('description') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
            Update Service
        </button>
    </form>

</x-admin-layout>
