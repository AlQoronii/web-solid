<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 space-y-6 py-7 px-2">
            <!-- Logo -->
            <div class="text-white flex items-center space-x-2 px-4">
                <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                </svg>
                <span class="text-2xl font-extrabold">Library</span>
            </div>

            <!-- Navigation -->
            <nav>
                <a href="{{ route('dashboard') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('users.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4.992 4.992 0 0112 15c1.657 0 3.156.672 4.121 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Users
                </a>
                <a href="{{ route('books.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>
                    Books
                </a>
                <a href="{{ route('categories.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    Categories
                </a>
                <a href="{{ route('loans.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Loans
                </a>
                <a href="{{ route('articles.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>
                    Articles
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10 text-2xl font-bold">
            <nav class="text-sm font-semibold mb-4 flex justify-between items-center">
            <ol class="list-reset flex">
            <li><a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-500">Home</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-blue-600">Dashboard</li>
            </ol>
            <div class="relative">
            <button class="flex items-center space-x-4 focus:outline-none" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="text-gray-600">{{ Auth::user()->name }}</span>
                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            </button>
            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" id="user-menu">
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</button>
                </form>
            </div>
            </div>
            </nav>
            </nav>
            <h1>Welcome, {{ Auth::user()->username }}!</h1>
            <p class="mt-4 text-lg">Use the sidebar to navigate through different management sections.</p>
            <!-- Cards Section -->
            <section>
                <div class="grid grid-cols-1 grid-rows-4 md:grid-rows-2 md:grid-cols-2 2xl:grid-cols-4 2xl:grid-rows-1 gap-5 mt-8">
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl text-navy-night">
                        <div>
                            <div class="bg-blue-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Books</h1>
                            <h1 class="text-base/7 font-semibold">{{ $booksCount }} Books</h1>
                        </div>
                    </div>
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl">
                        <div>
                            <div class="bg-green-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 19.121A3 3 0 007 20h10a3 3 0 001.879-.879l3-3A3 3 0 0022 14V7a3 3 0 00-.879-2.121l-3-3A3 3 0 0017 1H7a3 3 0 00-2.121.879l-3 3A3 3 0 001 7v7a3 3 0 00.879 2.121l3 3z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Users</h1>
                            <h1 class="text-base/7 font-semibold">{{ $usersCount }} Users</h1>
                        </div>
                    </div>
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl">
                        <div>
                            <div class="bg-yellow-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Loans</h1>
                            <h1 class="text-base/7 font-semibold">{{ $loansCount }} Loans</h1>
                        </div>
                    </div>
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl">
                        <div>
                            <div class="bg-red-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Articles</h1>
                            <h1 class="text-base/7 font-semibold">{{ $articlesCount }} Articles</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Cards Section -->
        </div>
    </div>

</body>
</html>