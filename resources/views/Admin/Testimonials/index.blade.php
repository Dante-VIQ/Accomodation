<h1 class="text-2xl font-bold mb-4">Pending Testimonials</h1>

@foreach ($pending as $item)
<div class="p-4 mb-3 bg-white rounded shadow">
    <p class="mb-2 italic">{{ $item->message }}</p>
    <b>{{ $item->name }}</b> — <span class="text-gray-500 text-sm">{{ $item->role }}</span>

    <form action="{{ route('admin.approve.testimonial', $item->id) }}" method="POST" class="mt-2">
        @csrf
        <button class="bg-green-600 text-white px-4 py-1 rounded">Approve</button>
    </form>
</div>
@endforeach

<h1 class="text-2xl font-bold mt-10 mb-4">Approved Testimonials</h1>
@foreach ($approved as $item)
<div class="p-4 mb-3 bg-gray-50 rounded border">
    <p class="mb-1 italic">{{ $item->message }}</p>
    <b>{{ $item->name }}</b>
</div>
@endforeach
