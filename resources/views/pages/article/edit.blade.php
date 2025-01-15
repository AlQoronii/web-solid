@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Article</h1>
            <form action="{{ route('articles.edit', ['article' => $article->article_id]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" id="article_title" name="article_title" value="{{ old('article_title', $article->article_title) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
                    <textarea id="article_content" name="article_content" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('article_content', $article->article_content) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block text-gray-700 font-bold mb-2">Image</label>
                    <input type="text" id="article_image" name="article_image" value="{{ old('article_image', $article->article_image) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection