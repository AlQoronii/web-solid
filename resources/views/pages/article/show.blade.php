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
            <img src="" alt="Book Image" id="article_image" class="w-50 h-80 object-cover rounded-lg mr-6">
            <div>
                <h1 class="text-3xl font-bold mb-4"><strong>Title: </strong> <span id="article_title"></span></h1>
                <p class="text-gray-700 mb-4"><strong>Content: </strong> <span id="article_content"></span></p>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', async function() {
        try {
            const articleId = "{{ $article }}";
            console.log('Article ID:', articleId);
            const articleResponse = await fetch(`{{ url('api/apiArticles') }}/${articleId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            });
            if (!articleResponse.ok) throw new Error('Failed to fetch article data');
            const article = await articleResponse.json();
            console.log('Article Data:', article);
            document.getElementById('article_image').src = `{{ asset('storage/articles/images') }}/${article.article_image}`;
            document.getElementById('article_title').textContent = `Article Title: ${article.article_title}`;
            document.getElementById('article_content').textContent = article.article_content;
        } catch (error) {
            console.error('Error fetching article data:', error);
        }
    });
</script>
@endsection