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
                    <a href="{{ route('patients.index') }}" class="block py-2 px-4 rounded hover:bg-green-700">Patients</a>
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
            <!-- Dashboard Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-bold text-gray-800">Total Patients</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $patientsCount ?? 0 }}</p>
                    <a href="{{ route('patients.index') }}" class="text-sm text-blue-500 hover:underline">View all patients</a>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-bold text-gray-800">Total Users</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $usersCount ?? 0 }}</p>
                    <a href="#users-section" class="text-sm text-green-500 hover:underline">View all users</a>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-bold text-gray-800">Appointments</h3>
                    <p class="text-3xl font-bold text-purple-600">0</p>
                    <a href="#" class="text-sm text-purple-500 hover:underline">View all appointments</a>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-bold text-gray-800">Doctors</h3>
                    <p class="text-3xl font-bold text-red-600">0</p>
                    <a href="#" class="text-sm text-red-500 hover:underline">View all doctors</a>
                </div>
            </div>

            <!-- Recent Patients -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-black text-lg font-bold">Recent Patients</h3>
                    <a href="{{ route('patients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Patient
                    </a>
                </div>

                @if(isset($recentPatients) && $recentPatients->count() > 0)
                    <table class="w-full mt-4 bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">Name</th>
                                <th class="py-2 px-4">Email</th>
                                <th class="py-2 px-4">Phone</th>
                                <th class="py-2 px-4">Added</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentPatients as $patient)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                    <td class="py-2 px-4">{{ $patient->email }}</td>
                                    <td class="py-2 px-4">{{ $patient->phone }}</td>
                                    <td class="py-2 px-4">{{ $patient->created_at->format('Y-m-d') }}</td>
                                    <td class="py-2 px-4 flex space-x-2">
                                        <a href="{{ route('patients.show', $patient) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded" style="background-color: #ADD8E6; color: grey">View</a>
                                        <a href="{{ route('patients.edit', $patient) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded" style="background-color: #E6E6FA; color: grey">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No patients found. <a href="{{ route('patients.create') }}" class="text-blue-500 hover:underline">Add your first patient</a></p>
                @endif
            </div>

            <!-- Users Section -->
            <div id="users-section" class="bg-white shadow-md rounded-lg p-6">
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
