@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Create New Book</h1>
            <form action="{{ route('books.store') }}" method="POST">
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
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="book_title" name="book_title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-gray-700 font-bold mb-2">Author</label>
                    <input type="text" id="book_author" name="book_author" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="publisher" class="block text-gray-700 font-bold mb-2">Publisher</label>
                    <input type="text" id="book_publisher" name="book_publisher" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="year" class="block text-gray-700 font-bold mb-2">Year</label>
                    <input type="number" id="book_year" name="book_year" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Image</label>
                    <textarea id="book_image" name="book_image" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection