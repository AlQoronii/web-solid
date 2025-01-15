@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
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