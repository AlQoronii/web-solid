@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <a href="{{ route('articles.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="w-full bg-white border p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Create New Article</h1>
            <div x-data="{ showModal: false }">
                <!-- Form -->
                <form 
                    id="createForm"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title <span class="text-red-500">*</span></label>
                        <input 
                            type="text" 
                            id="article_title" 
                            name="article_title" 
                            class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                        >
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Content <span class="text-red-500">*</span></label>
                        <textarea 
                            id="article_content" 
                            name="article_content" 
                            rows="5" 
                            class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                        ></textarea>
                    </div>
                    <x-input-file 
                        label="Article Image"
                        name="article_image"
                        src="{{ isset($article->article_image) ? 'storage/articles/images/' . $article->article_image : null }}"
                        placeholderText="SVG, PNG, JPG or GIF (MAX. 800x400px)"
                    />
                    <div class="flex justify-end">
                        <x-validation
                        buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                        :action="'http://127.0.0.1:8000/api/articles'" 
                        :method="'POST'" 
                        :formId="'createForm'"
                        :href="'/articles'"
                        title="Tambah Artikel" 
                        message="Apakah Anda yakin ingin membuat artikel ini?" 
                        button-text="Submit"
                        cancel-text="Batal"
                        confirm-text="Ya, Tambahkan"
                        confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    />  
                    </div>



            </div>
        </div>
    </div>
</div>
@endsection
