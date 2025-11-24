<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">All Bookings</h2>

    <table class="w-full border text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">Guest</th>
                <th class="p-3">Room</th>
                <th class="p-3">Dates</th>
                <th class="p-3">People</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $b)
                <tr class="border-b">
                    <td class="p-3">{{ $b->full_name }}<br>{{ $b->phone }}</td>
                    <td class="p-3">{{ $b->room->name }}</td>
                    <td class="p-3">{{ $b->check_in }} → {{ $b->check_out }}</td>
                    <td class="p-3">
                        Adults: {{ $b->adults }}<br>
                        Children: {{ $b->children }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bookings->links() }}
</div>
