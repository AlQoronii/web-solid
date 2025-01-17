@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Book</h1>
            <form action="{{ route('books.update', $book->book_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
                    <select id="category_id" name="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ $book->category_id == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="book_title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="book_title" name="book_title" value="{{ $book->book_title }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_author" class="block text-gray-700 font-bold mb-2">Author</label>
                    <input type="text" id="book_author" name="book_author" value="{{ $book->book_author }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_publisher" class="block text-gray-700 font-bold mb-2">Publisher</label>
                    <input type="text" id="book_publisher" name="book_publisher" value="{{ $book->book_publisher }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_year" class="block text-gray-700 font-bold mb-2">Year</label>
                    <input type="number" id="book_year" name="book_year" value="{{ $book->book_year }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_image" class="block text-gray-700 font-bold mb-2">Image</label>
                    <textarea id="book_image" name="book_image" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ $book->book_image }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
