@extends('layouts.dashboard')
@section('content')
<div class="bg-100">
    <div class="container mx-auto p-4">
        <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">
            <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
        <div class="bg-white shadow-md rounded-lg p-6" id="book-details">
            <div class="flex items-center">
                <img id="book-image" src="" alt="Book Image" class="w-50 h-80 object-cover rounded-lg mr-6">
                <div>
                    <h1 class="text-2xl font-bold mb-2" id="book-title">Book Title: </h1>
                    <p class="text-gray-700 mb-1"><strong>Author:</strong> <span id="book-author"></span></p>
                    <p class="text-gray-700 mb-1"><strong>Publisher:</strong> <span id="book-publisher"></span></p>
                    <p class="text-gray-700 mb-1"><strong>Year:</strong> <span id="book-year"></span></p>
                    <p class="text-gray-700 mb-1"><strong>Category:</strong> <span id="book-category"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async function() {
        try {
            const bookId = "{{ $book }}";
            console.log('Book ID:', bookId);
            const bookResponse = await fetch(`http://127.0.0.1:8000/api/apiBooks/${bookId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            });

            if (!bookResponse.ok) throw new Error('Failed to fetch book data');
            const book = await bookResponse.json();
            console.log('Book Data:', book);

            document.getElementById('book-image').src = `{{ asset('storage/books/images') }}/${book.book_image}`;
            document.getElementById('book-title').textContent = `Book Title: ${book.book_title}`;
            document.getElementById('book-author').textContent = book.book_author;
            document.getElementById('book-publisher').textContent = book.book_publisher;
            document.getElementById('book-year').textContent = book.book_year;
            document.getElementById('book-category').textContent = book.category.category_name;
        } catch (error) {
            console.error('Error fetching book data:', error);
        }
    });
</script>
@endsection