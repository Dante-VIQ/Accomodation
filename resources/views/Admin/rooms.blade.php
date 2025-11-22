<x-admin-layout>
    <div class="max-w-4xl w-full flex flex-col p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Rooms</h1>
            <a href="{{ route('rooms.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                Create Room
            </a>
        </div>

        <table class="w-full border bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">Image</th>
                    <th class="p-3 border">Name</th>
                    <th class="p-3 border">Type</th>
                    <th class="p-3 border">Price</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rooms as $room)
                    <tr class="border">
                        <td class="p-3">
                            <img src="{{ $room->image }}" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="p-3">{{ $room->name }}</td>
                        <td class="p-3 capitalize">{{ $room->type }}</td>
                        <td class="p-3">${{ number_format($room->price, 2) }}</td>

                        <td class="p-3">
                            <a href="{{ route('rooms.edit', $room) }}" class="text-blue-600 mr-3">Edit</a>

                            <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this room?')" class="text-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $rooms->links() }}</div>
    </div>
</x-admin-layout>
