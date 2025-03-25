<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-12 bg-turquoise min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-sea-green p-6 rounded-lg shadow-md">
                <h3 class="text-white text-lg font-bold">Edit User</h3>

                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-label for="name" value="Name" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="Email" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('dashboard') }}" class="underline text-sm text-white hover:text-gray-300">Cancel</a>
                        <x-button class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
