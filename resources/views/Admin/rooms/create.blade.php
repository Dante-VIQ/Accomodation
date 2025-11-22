<x-admin-layout>
	<div class="max-w-2xl mx-auto py-10">
		<h2 class="text-2xl font-bold mb-6">Add New Room</h2>
		<form action="{{ route('rooms.store') }}" method="POST" class="space-y-6">
			@csrf
			<div>
				<label class="block mb-2 font-semibold">Room Name</label>
				<input type="text" name="name" class="input w-full" required>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Room Type/Style</label>
				<input type="text" name="type" class="input w-full" required>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Image URL</label>
				<input type="url" name="image" class="input w-full" required>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Description</label>
				<textarea name="description" class="input w-full" rows="4" required></textarea>
			</div>
			<div>
				<label class="block mb-2 font-semibold">Price per Night</label>
				<input type="number" name="price" class="input w-full" step="0.01" required>
			</div>
			<button type="submit" class="btn-primary w-full">Create Room</button>
		</form>
	</div>
</x-admin-layout>
