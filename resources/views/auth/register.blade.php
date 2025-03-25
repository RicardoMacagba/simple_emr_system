<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-[#40E0D0]" style="background-image: url('https://media.istockphoto.com/id/527567529/vector/electronic-medical-records.jpg?s=612x612&w=0&k=20&c=f2sF-jEn2xIeg6Ap59EG9vfV4RO_qYGWh62f8YIkVSI=');" style="background-size: cover; background-position: center;">
        <div class="max-w-md border-10 border-gray-700 shadow-lg p-6 rounded-lg">
            <div class="flex justify-center">
                <x-authentication-card-logo />
            </div>

            <h2 class="bg-[#40E0D0] text-center text-2xl font-bold text-white mt-4">Register for EMR System</h2>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-label for="name" value="Name" class="text-white font-bold" />
                    <x-input id="name" class="block mt-1 w-full border-gray-400 bg-white text-gray-900" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" value="Email" class="text-white font-bold" />
                    <x-input id="email" class="block mt-1 w-full border-gray-400 bg-white text-gray-900" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-label for="password" value="Password" class="text-white font-bold" />
                    <x-input id="password" class="block mt-1 w-full border-gray-400 bg-white text-gray-900" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-label for="password_confirmation" value="Confirm Password" class="text-white font-bold" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border-gray-400 bg-white text-gray-900" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms" class="text-white">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-yellow-300 hover:text-yellow-400">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-yellow-300 hover:text-yellow-400">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <!-- Buttons -->
                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-yellow-300 hover:underline" href="{{ route('login') }}">
                        Already registered?
                    </a>
                    <x-button class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-4 py-2">
                        Register
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
