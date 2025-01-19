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
            <h1 class="text-2xl font-bold mb-6">Create New Book</h1>
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
                    <select id="category_id" name="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>

                    <?php
                        // dd($categories);
                    ?>
                </div>
                <div class="mb-4">
                    <label for="book_title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="book_title" name="book_title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_author" class="block text-gray-700 font-bold mb-2">Author</label>
                    <input type="text" id="book_author" name="book_author" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_publisher" class="block text-gray-700 font-bold mb-2">Publisher</label>
                    <input type="text" id="book_publisher" name="book_publisher" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="book_year" class="block text-gray-700 font-bold mb-2">Year</label>
                    <input type="number" id="book_year" name="book_year" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <x-input-file 
                label="Book Image" 
                name="book_image" 
                src="{{ isset($book->book_image) ? 'storage/books/images/' . $book->book_image : null }}" 
                placeholderText="SVG, PNG, JPG or GIF (MAX. 800x400px)" 
                />
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 flex items-center">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection