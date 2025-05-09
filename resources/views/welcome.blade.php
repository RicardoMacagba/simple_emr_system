<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif

        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #40E0D0;
                
            }
        </style>
    </head>
    <body class="text-gray-900">
        <!-- Hero Section style="background-image: url('https://media.istockphoto.com/id/527567529/vector/electronic-medical-records.jpg?s=612x612&w=0&k=20&c=f2sF-jEn2xIeg6Ap59EG9vfV4RO_qYGWh62f8YIkVSI=');" style="background-size: cover; background-position: center;" -->
        {{-- <img src="{{ asset('build/assets/Electronic Medical Records System.png') }}" alt="Welcome Image" class="w-full h-auto"> --}}
        <header class="relative bg-cover bg-center h-screen"> 
            
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-black px-6 ">
                <img src="{{ asset('build/assets/emr_logo.png') }}" alt="Welcome Image" class="w-15 h-17 mb-10 opacity-20">
                <h1 class="text-5xl font-bold">Electronic Medical Record System</h1>
                <p class="mt-4 text-lg max-w-2xl">
                    Transforming healthcare with modern digital solutions. Secure, efficient, and accessible patient records.
                </p>
                <div class="mt-6">
                    <a href="{{ route('register') }}" class="bg-seaGreen text-black px-6 py-3 rounded-lg shadow-lg text-lg hover:bg-green-700">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="ml-4 bg-seaGreen text-black px-6 py-3 rounded-lg shadow-lg text-lg hover:bg-green-700">
                        Login
                    </a>
                </div>
            </div>
        </header>
    
        <!-- Features Section -->
        <section class="relative bg-cover py-16" >
            <div class="container mx-auto px-6 text-center bg-cover relative">
                <h2 class="text-3xl font-bold text-gray-800">Why Choose Our EMR System?</h2>
                <p class="mt-4 text-gray-600">A modern and intuitive way to manage electronic medical records efficiently.</p>
    
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-10">
                    <!-- Feature 1 -->
                    <div class="p-6 border rounded-lg shadow-lg">
                        {{-- <img src="" alt="Security" class="mx-auto"> --}}
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Secure & HIPAA Compliant</h3>
                        <p class="mt-2 text-gray-600">Your patient data is encrypted and fully protected.</p>
                    </div>
    
                    <!-- Feature 2 -->
                    <div class="p-6 border rounded-lg shadow-lg">
                        {{-- <img src="" alt="Efficiency" class="mx-auto"> --}}
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Fast & Efficient</h3>
                        <p class="mt-2 text-gray-600">Designed for smooth workflow and easy access to records.</p>
                    </div>
    
                    <!-- Feature 3 -->
                    <div class="relative p-6 border rounded-lg shadow-lg">
                        {{-- <img src="" alt="Cloud Storage" class="mx-auto"> --}}
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Cloud-Based Access</h3>
                        <p class="mt-2 text-gray-600">Access medical records from anywhere, anytime.</p>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Footer -->
        <footer class="relative bg-cover text-black text-center py-6 mt-16">
            <p class="text-lg">&copy; 2025 Electronic Medical Record System. All Rights Reserved.</p>
        </footer>
    </body>
</html>
