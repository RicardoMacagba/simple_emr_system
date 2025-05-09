<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Patient Details') }}
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('patients.edit', $patient) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Edit Patient
                </a>
                <a href="{{ route('patients.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->first_name }} {{ $patient->last_name }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->date_of_birth->format('F j, Y') }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Gender</label>
                                <p class="mt-1 text-sm text-gray-900">{{ ucfirst($patient->gender) }}</p>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900">Contact Information</h3>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->email }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->phone }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Address</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->address }}</p>
                            </div>
                        </div>

                        <!-- Medical Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900">Medical Information</h3>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Medical History</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->medical_history ?? 'No medical history recorded' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Allergies</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->allergies ?? 'No allergies recorded' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Blood Type</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->blood_type ?? 'Not specified' }}</p>
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900">Emergency Contact</h3>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Emergency Contact Name</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->emergency_contact_name }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Emergency Contact Phone</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $patient->emergency_contact_phone }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this patient?')">
                                Delete Patient
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 