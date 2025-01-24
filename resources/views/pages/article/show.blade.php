@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('articles.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center">
            <img src="{{ asset('storage/articles/images/' . $article->article_image) }}" alt="Book Image" class="w-50 h-80 object-cover rounded-lg mr-6">
            <div>
                <h1 class="text-3xl font-bold mb-4">Title: {{ $article->article_title }}</h1>
                <p class="text-gray-700 mb-4">Content: {{ $article->article_content }}</p>
            </div>
        </div>
    </div>
</div>
@endsection