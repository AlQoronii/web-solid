@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('categories.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Category</h1>
            <form action="{{ route('categories.update', ['category' => $category->category_id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="category_name" class="block text-gray-700 font-bold mb-2">Category Name</label>
                    <input type="text" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="category_description" class="block text-gray-700 font-bold mb-2">Category Description</label>
                    <textarea id="category_description" name="category_description" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('category_description', $category->category_description) }}</textarea>
                </div>
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="route('categories.update', $category->category_id)" 
                    :method="'PUT'" 
                    title="Update Category" 
                    message="Apakah Anda yakin ingin mengupdate category ini?" 
                    button-text="Update"
                    cancel-text="Batal"
                    confirm-text="Ya, Update"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection