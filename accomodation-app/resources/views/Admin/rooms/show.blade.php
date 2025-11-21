<x-guest-layout>
	<div class="max-w-2xl mx-auto py-10">
		<h2 class="text-2xl font-bold mb-6">Room Details</h2>
		<div class="border rounded-lg p-6">
			<img src="{{ $room->image }}" alt="{{ $room->name }}" class="w-full mb-4 rounded">
			<h3 class="text-xl font-semibold mb-2">{{ $room->name }}</h3>
			<p class="mb-2"><span class="font-semibold">Type/Style:</span> {{ $room->type }}</p>
			<p class="mb-2"><span class="font-semibold">Description:</span> {{ $room->description }}</p>
			<p class="mb-2"><span class="font-semibold">Price per Night:</span> ${{ number_format($room->price, 2) }}</p>
		</div>
		<div class="mt-6 flex gap-4">
			<a href="{{ route('rooms.edit', $room->id) }}" class="btn-primary">Edit</a>
			<a href="{{ route('rooms.index') }}" class="btn-white">Back to List</a>
		</div>
	</div>
</x-guest-layout>
