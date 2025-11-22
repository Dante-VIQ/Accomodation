<x-admin-layout>
<h1 class="text-2xl font-bold mb-4">Edit Blog</h1>

<form method="POST" action="{{ route('blogs.update', $blog) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <label class="block mb-2">Image</label>
    <img src="{{ asset('storage/' . $blog->image) }}" class="h-20 mb-2">
    <input type="file" name="image" class="border p-2 w-full mb-4">

    <label class="block mb-2">Title</label>
    <input type="text" name="title" value="{{ $blog->title }}" class="border p-2 w-full mb-4">

    <label class="block mb-2">Body</label>
    <textarea name="body" rows="6" class="border p-2 w-full mb-4">{{ $blog->body }}</textarea>

    <button class="px-4 py-2 bg-green-600 text-white rounded">
        Update Blog
    </button>
</form>
</x-admin-layout>
