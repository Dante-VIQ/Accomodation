<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6">Add New Service</h1>

    <form action="{{ route('services.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 max-w-xl">
        @csrf

        <div>
            <label class="block font-medium">Image</label>
            <input type="file" name="image" class="mt-2 border rounded-lg p-2 w-full">
            @error('image') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Service Name</label>
            <input type="text" name="name" class="mt-2 border rounded-lg p-2 w-full">
            @error('name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" rows="4"
                      class="mt-2 border rounded-lg p-2 w-full"></textarea>
            @error('description') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded-lg">
            Create Service
        </button>
    </form>
</x-admin-layout>
