@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Create New Article</h1>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="article_title" name="article_title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                    <textarea id="article_content" name="article_content" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <x-input-file 
                label="Article Image"
                name="article_image"
                src="{{ isset($article->article_image) ? 'storage/articles/images/' . $article->article_image : null }}"
                placeholderText="SVG, PNG, JPG or GIF (MAX. 800x400px)"
                />
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection