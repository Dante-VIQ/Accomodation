<x-admin-layout>
    <div class="max-w-4xl w-full flex flex-col p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold mb-4">Blog Posts</h1>

            <a href="{{ route('blogs.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">+ Add
                Blog</a>
        </div>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">Image</th>
                    <th class="p-2">Title</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr class="border-b">
                        <td class="p-2">
                            <img src="{{ asset($blog->image) }}" class="h-16 w-16 object-cover rounded">
                        </td>
                        <td class="p-2">{{ $blog->title }}</td>
                        <td class="p-2">
                            <a href="{{ route('blogs.edit', $blog) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600" onclick="return confirm('Delete blog?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $blogs->links() }}
        </div>
    </div>
</x-admin-layout>
