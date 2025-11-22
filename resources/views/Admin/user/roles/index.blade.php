<x-admin-layout>
    <div class="max-w-4xl w-full flex flex-col bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">User Role Assignment</h2>

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border text-left">User</th>
                    <th class="p-3 border text-left">Current Role</th>
                    <th class="p-3 border text-left">Assign Role</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr class="border">
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3 capitalize">{{ $user->roles->pluck('name')->first() ?? 'None' }}</td>

                        <td class="p-3">
                            <form action="{{ route('admin.roles.update', $user) }}" method="POST">
                                @csrf

                                <select name="role" class="border rounded p-2">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            @if ($user->hasRole($role->name)) selected @endif>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>

                                <button class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Save
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-admin-layout>
