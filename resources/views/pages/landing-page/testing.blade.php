<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
{{-- <x-notification /> --}}
    {{-- <!-- Navigation Bar --> --}}
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <!-- Logo -->
                    <div>
                        <a href="#" class="flex items-center py-5 px-2 text-gray-700">
                            <svg class="h-6 w-6 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                            </svg>
                            <span class="font-bold">Library</span>
                        </a>
                    </div>
                </div>
                <!-- Primary Nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="py-5 px-3 text-gray-700 hover:text-blue-900">Home</a>
                    <a href="#features" class="py-5 px-3 text-gray-700 hover:text-blue-900">Features</a>
                    <a href="#contact" class="py-5 px-3 text-gray-700 hover:text-blue-900">Contact</a>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('login') }}" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
                </div>
                <!-- Login Button -->
                <!-- Mobile Button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden">
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
            <a href="#features" class="block py-2 px-4 text-sm hover:bg-gray-200">Features</a>
            <a href="#contact" class="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
            {{-- <a href="{{ route('login') }}" class="block py-2 px-4 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Login</a> --}}
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-2 text-gray-800">Welcome to Our Library</h2>
            <h3 class="text-2xl mb-8 text-gray-600">Explore a World of Knowledge</h3>
            <a href="#features" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">Start Exploring</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Our Features</h2>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <img src="{{ asset('assets/images/library-books.jpg') }}" alt="Books" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-bold mb-2">Extensive Collection</h3>
                        <p class="text-gray-600">Access thousands of books, journals, and digital resources across various genres and subjects.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <img src="{{ asset('assets/images/library-reading.jpg') }}" alt="Reading Area" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-bold mb-2">Comfortable Reading Areas</h3>
                        <p class="text-gray-600">Enjoy our comfortable and quiet reading areas designed to enhance your reading experience.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <img src="{{ asset('assets/images/library-digital.png') }}" alt="Digital Resources" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-bold mb-2">Digital Resources</h3>
                        <p class="text-gray-600">Access a wide range of digital resources, including e-books, audiobooks, and online databases.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-blue-500 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-2">Join Our Library Today</h2>
            <p class="text-xl mb-8">Become a member and start exploring our extensive collection of resources.</p>
            <a href="#membership" class="bg-white text-blue-500 py-2 px-4 rounded-full hover:bg-gray-200">Become a Member</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2023 Library. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        const btn = document.querySelector('button.mobile-menu-button');
        const menu = document.querySelector('.mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>