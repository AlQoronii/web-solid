@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('articles.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto mt-10">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Article</h1>
            <form id="editForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="article_title" name="article_title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-bold mb-2">Content <span class="text-red-500">*</span></label>
                    <textarea id="article_content" name="article_content" rows="5" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <x-input-file label="Article Image" 
                name="article_image" 
                id="article_image"
                src="{{ isset($article->article_image) ? 'storage/articles/images/' . $article->article_image : null }}" 
                placeholderText="SVG, PNG, JPG or GIF (MAX. 800x400px)" 
                />
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/articles/' . $article" 
                    :method="'POST'" 
                    :formId="'editForm'"
                    :href="'/articles'"
                    title="Update Artikel" 
                    message="Apakah Anda yakin ingin mengupdate artikel ini?" 
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


<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const imageBaseURL = "{{ asset('storage/articles/images') }}";
        const articleId = "{{ $article }}";
        const token = localStorage.getItem('auth_token');
        console.log('Article ID:', articleId);

        try{
            const articleResponse = await fetch (`http://127.0.0.1:8000/api/apiArticles/${articleId}`,{
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            if(!articleResponse.ok) throw new Error('Failed to fetch article data');
            const article = await articleResponse.json();
            console.log('Article Data:', article);

            document.getElementById('article_title').value = article.article_title;
            document.getElementById('article_content').value = article.article_content;
            if(article.article_image){
                const articleImageElement = document.getElementById('preview-article_image');
                articleImageElement.src = `${imageBaseURL}/${article.article_image}`;
                articleImageElement.classList.remove('hidden');

                const placeHolderElement = document.getElementById('placeholder-article_image');
                if(placeHolderElement){
                    placeHolderElement.classList.add('hidden');
                }
            }
            console.log('Article Image:', article.article_image);
        }catch(error){
            console.error('Error fetching article data:', error);
        }
    });
</script>
@endsection