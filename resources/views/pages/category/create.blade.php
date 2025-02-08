@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <a href="{{ route('categories.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="w-full bg-white p-8 border rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Create New Category</h1>
            <form id="createForm">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name <span class="text-red-500">*</span></label>
                    <input type="text" id="category_name" name="category_name" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="category_description" name="category_description" rows="5" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/categories'" 
                    :method="'POST'" 
                    :formId="'createForm'"
                    :href="'/categories'"
                    title="Tambah Category" 
                    message="Apakah Anda yakin ingin menambah category ini?" 
                    button-text="Submit"
                    cancel-text="Batal"
                    confirm-text="Ya, Tambahkan"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
