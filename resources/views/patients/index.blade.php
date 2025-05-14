<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Patients') }}
            </h2>
            <a href="{{ route('patients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Patient
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-400">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border border-gray-400">Name</th>
                                    <th class="px-4 py-2 border border-gray-400">Email</th>
                                    <th class="px-4 py-2 border border-gray-400">Phone</th>
                                    <th class="px-4 py-2 border border-gray-400">Gender</th>
                                    <th class="px-4 py-2 border border-gray-400">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $patient->email }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $patient->phone }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ ucfirst($patient->gender) }}</td>
                                        <td class="border border-gray-400 px-4 py-2 space-x-2">
                                            <a href="{{ route('patients.show', $patient->id) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-1 px-3 rounded">VIEW</a>
                                            <a href="{{ route('patients.edit', $patient->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-1 px-3 rounded">EDIT</a>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-1 px-3 rounded">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>