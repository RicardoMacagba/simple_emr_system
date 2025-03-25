<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <div class="flex min-h-screen bg-green-900" style="background-image: url('https://media.istockphoto.com/id/527567529/vector/electronic-medical-records.jpg?s=612x612&w=0&k=20&c=f2sF-jEn2xIeg6Ap59EG9vfV4RO_qYGWh62f8YIkVSI=');" style="background-size: cover; background-position: center;"">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-sea-green-500 p-6 text-black min-h-screen" style="background-color: #40E0D0;">
            <h3 class="text-lg font-bold">EMR System</h3>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-green-700">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Patients</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Appointments</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Doctors</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Billing</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-green-700">Reports</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-black text-lg font-bold">User List</h3>

                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif

                @if($users->isEmpty())
                    <p class="text-black">No users found.</p>
                @else
                    <table class="w-full mt-4 bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">ID</th>
                                <th class="py-2 px-4">Name</th>
                                <th class="py-2 px-4">Email</th>
                                <th class="py-2 px-4">Created At</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $user->id }}</td>
                                    <td class="py-2 px-4">{{ $user->name }}</td>
                                    <td class="py-2 px-4">{{ $user->email }}</td>
                                    <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td class="py-2 px-4 flex space-x-2">
                                        <a href="{{ route('users.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded" style="background-color: #ADD8E6; font-color: grey">Edit</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" style="background-color: lightsalmon">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</x-app-layout>
