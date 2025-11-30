<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Create Blog</h1>

    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2">Image</label>
        <input type="file" name="image" class="border p-2 w-full mb-4">

        <label class="block mb-2">Title</label>
        <input type="text" name="title" class="border p-2 w-full mb-4">

        <label class="block mb-2">Body</label>
        <textarea name="body" rows="6" class="border p-2 w-full mb-4"></textarea>

        <button class="px-4 py-2 bg-green-600 text-white rounded">
            Save Blog
        </button>
    </form>
</x-admin-layout>
