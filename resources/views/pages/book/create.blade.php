@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg border">
            <h1 class="text-2xl font-bold mb-6">Create New Book</h1>
            <form enctype="multipart/form-data" id="createForm">
                @csrf
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-bold mb-2">Category <span class="text-red-500">*</span></label>
                    <select id="category_id" name="category_id" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                    <span class="text-red-500 text-sm" id="categoryError"></span>
                    

                    <?php
                        // dd($categories);
                    ?>
                </div>
                <div class="mb-4" >
                    <label for="book_title" class="block text-gray-700 font-bold mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="book_title" name="book_title" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="text-red-500 text-sm" id="book_titleError"></span>
                </div>
                <div class="mb-4">
                    <label for="book_author" class="block text-gray-700 font-bold mb-2">Author <span class="text-red-500">*</span></label>
                    <input type="text"   id="book_author" name="book_author" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="text-red-500 text-sm" id="book_authorError"></span>
                </div>
                <div class="mb-4">
                    <label for="book_publisher" class="block text-gray-700 font-bold mb-2">Publisher <span class="text-red-500">*</span></label>
                    <input type="text" id="book_publisher" name="book_publisher" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="text-red-500 text-sm" id="book_publisherError"></span>
                </div>
                <div class="mb-4">
                    <label for="book_year" class="block text-gray-700 font-bold mb-2">Year <span class="text-red-500">*</span></label>
                    <input type="number" id="book_year" name="book_year" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="text-red-500 text-sm" id="book_yearError"></span>
                </div>
                <x-input-file 
                label="Book Image" 
                name="book_image" 
                src="{{ isset($book->book_image) ? 'storage/books/images/' . $book->book_image : null }}" 
                placeholderText="SVG, PNG, JPG or GIF (MAX. 800x400px)" 
                />
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/books'" 
                    :method="'POST'" 
                    :formId="'createForm'"
                    title="Tambah Buku" 
                    message="Apakah Anda yakin ingin menambahkan buku ini?" 
                    button-text="Submit"
                    :href="'/books'"
                    cancel-text="Batal"
                    confirm-text="Ya, Tambahkan"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('http://127.0.0.1:8000/api/apiCategories')
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById('category_id');
                    data.forEach(category => {
                        let option = document.createElement('option');
                        option.value = category.category_id;
                        option.text = category.category_name;
                        select.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching categories:', error));
        });
    </script>
</div>
@endsection