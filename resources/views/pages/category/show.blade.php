@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div>
                    <p class="text-gray-700 mb-1"><strong>Category ID:</strong> {{ $category->category_id }}</p>
                    <p class="text-gray-700 mb-1"><strong>Category Name:</strong> {{ $category->category_name }}</p>
                    <p class="text-gray-700 mb-1"><strong>Category Description:</strong> {{ $category->category_description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection