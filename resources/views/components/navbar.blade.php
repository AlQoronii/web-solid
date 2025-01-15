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