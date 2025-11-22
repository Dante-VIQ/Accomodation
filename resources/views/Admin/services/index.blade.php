<x-admin-layout>
    <div class="max-w-4xl w-full flex flex-col p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Hotel Services</h1>
            <a href="{{ route('services.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                + Add Service
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <div class="border rounded-lg p-4 shadow-sm">
                    <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-40 object-cover rounded-lg mb-3">

                    <h2 class="text-lg font-semibold">{{ $service->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $service->description }}</p>

                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-2 bg-red-600 text-white rounded-lg">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $services->links() }}
        </div>
    </div>
</x-admin-layout>
