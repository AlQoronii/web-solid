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
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div>
                    {{-- <p class="text-gray-700 mb-1"><strong>Category ID:</strong> {{ $category->category_id }}</p> --}}
                    <p class="text-gray-700 mb-1"><strong>Category Name:</strong> <span id="category_name"></span></p>
                    <p class="text-gray-700 mb-1"><strong>Category Description:</strong> <span id="category_description"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', async function (){
        try{
            const categoryId = "{{$category}}";
            console.log('id: ',categoryId);

            const categoryResponse = await fetch(`{{url('api/apiCategories')}}/${categoryId}`,{
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json,'
                }
            });
            
            if(!categoryResponse.ok) throw new Error('Failed to fetch categories data');
            const category = await categoryResponse.json();
            console.log(category)
            document.getElementById('category_name').textContent = `${category.category_name}`;
            document.getElementById('category_description').textContent = `${category.category_name}`;

        }catch(error){
            console.log('Error fetching data: ',error)
        }
    });
</script>
@endsection