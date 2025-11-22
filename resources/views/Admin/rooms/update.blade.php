<x-guest-layout>
	<div class="max-w-2xl mx-auto py-10">
		<h2 class="text-2xl font-bold mb-6">Edit Room</h2>
		<form action="{{ route('rooms.update', $room->id) }}" method="POST" class="space-y-6">
			@csrf
			@method('PUT')
			<div>
				<label class="block mb-2 font-semibold">Room Name</label>
				<input type="text" name="name" class="input w-full" value="{{ $room->name }}" required>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Room Type/Style</label>
				<input type="text" name="type" class="input w-full" value="{{ $room->type }}" required>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Image URL</label>
				<input type="url" name="image" class="input w-full" value="{{ $room->image }}" required>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Description</label>
				<textarea name="description" class="input w-full" rows="4" required>{{ $room->description }}</textarea>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Price per Night</label>
				<input type="number" name="price" class="input w-full" step="0.01" value="{{ $room->price }}" required>
			</div>
			<button type="submit" class="btn-primary w-full">Update Room</button>
		</form>
	</div>
</x-guest-layout>
