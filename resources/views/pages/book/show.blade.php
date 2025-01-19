@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto p-4">
        <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">
            <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <img src="{{ asset('storage/books/images/' . $book->book_image) }}" alt="Book Image" class="w-50 h-80 object-cover rounded-lg mr-6">
                <div>
                    <h1 class="text-2xl font-bold mb-2">Book Title: {{ $book->book_title }}</h1>
                    <p class="text-gray-700 mb-1"><strong>Author:</strong> {{ $book->book_author }}</p>
                    <p class="text-gray-700 mb-1"><strong>Publisher:</strong> {{ $book->book_publisher }}</p>
                    <p class="text-gray-700 mb-1"><strong>Year:</strong> {{ $book->book_year }}</p>
                    <p class="text-gray-700 mb-1"><strong>Category:</strong> {{ $book->category->category_name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection