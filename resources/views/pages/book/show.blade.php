@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <img src="{{ $book->book_image }}" alt="Book Image" class="w-32 h-48 object-cover rounded-lg mr-6">
                <div>
                    <h1 class="text-2xl font-bold mb-2">{{ $book->book_title }}</h1>
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