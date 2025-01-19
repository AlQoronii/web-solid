@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('articles.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-4">{{ $article->article_title }}</h1>
            <p class="text-gray-700 mb-4">{{ $article->article_content }}</p>
            <div class="text-sm text-gray-500">
                <p>{{ $article->article_image }}</p>
            </div>
        </div>
    </div>
</div>
@endsection