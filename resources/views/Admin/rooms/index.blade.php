@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manage Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg">
        Add New Room
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
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
                    @if($room->images && count($room->images) > 0)
                        <img src="{{ Storage::url($room->images[0]) }}" class="h-12 w-12 object-cover rounded">
                    @else
                        <img src="{{ Storage::url('rooms/default.jpg') }}" class="h-12 w-12 object-cover rounded">
                    @endif
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
                    <a href="{{ route('rooms.edit', $room) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $rooms->links() }}
</div>
@endsection