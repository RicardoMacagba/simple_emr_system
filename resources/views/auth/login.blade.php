<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-[#40E0D0]" style="background-image: url('https://media.istockphoto.com/id/527567529/vector/electronic-medical-records.jpg?s=612x612&w=0&k=20&c=f2sF-jEn2xIeg6Ap59EG9vfV4RO_qYGWh62f8YIkVSI=');" style="background-size: cover; background-position: center;">
        <div class="max-w-md bg-[#2E8B57] border-4 border-gray-700 shadow-lg p-6 rounded-lg">
            <div class="flex justify-center">
                <x-authentication-card-logo />
            </div>

            <h2 class="text-center text-2xl font-bold text-black mt-4">Login to EMR System</h2>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-yellow-300">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" value="Email" class="text-white font-bold" />
                    <x-input id="email" class="block mt-1 w-full border-gray-400 bg-white text-gray-900" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-label for="password" value="Password" class="text-white font-bold" />
                    <x-input id="password" class="block mt-1 w-full border-gray-400 bg-white text-gray-900" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-yellow-300">Remember me</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-yellow-300 hover:underline" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <x-button class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-4 py-2">
                        Log in
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
