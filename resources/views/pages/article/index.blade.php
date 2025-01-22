@extends('layouts.dashboard')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-5">Article</h1>
    @if(session('success'))
        <x-alert-popup type="success" :message="session('success')" />
    @endif

    @if(session('error'))
        <x-alert-popup type="error" :message="session('error')" />
    @endif
    <div class="flex justify-between mb-5">
        <a href="{{ route('articles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New Article</a>
        <form method="GET" action="{{ route('articles.index') }}" class="flex">
            <input type="text" name="search" placeholder="Search articles..." value="{{ $search }}" class="px-4 py-2 border rounded-l">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button>
        </form>
    </div>

    <table class="min-w-full bg-white border table-fixed">
        <thead class="bg-blue-100">
            <tr>
                <th class="py-2 px-4 border-b text-center w-1/4">Title</th>
                <th class="py-2 px-4 border-b text-center w-1/3">Content</th>
                <th class="py-2 px-4 border-b text-center w-1/6">Image</th>
                <th class="py-2 px-4 border-b text-center w-1/4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td class="py-2 px-4 border-b text-center">{{ $article->article_title }}</td>
                <td class="py-2 px-4 border-b text-center">{{ Str::limit($article->article_content, 50) }}</td>
                <td class="py-2 px-4 border-b text-center">
                    @if($article->article_image)
                        <img src="{{ asset('storage/articles/images/' . $article->article_image) }}" alt="Article Image" class="w-16 h-16 mx-auto rounded">
                    @else
                        <img src="{{ asset('assets/images/library-books.jpg') }}" alt="Default Image" class="w-16 h-16 mx-auto rounded">
                    @endif
                </td>
                <td class="py-2 px-4 border-b text-center">
                    <div class="flex justify-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('articles.edit', $article->article_id) }}" 
                            class="bg-yellow-400 w-16 text-yellow-900 px-2 py-1 rounded hover:bg-yellow-500 inline-block text-center"
                        >
                            Edit
                        </a>
                
                        <!-- Detail Button -->
                        <a href="{{ route('articles.show', $article->article_id) }}" 
                            class="bg-blue-400 text-blue-900 px-2 py-1 rounded hover:bg-blue-500 inline-block text-center"
                        >
                            Detail
                        </a>
                
                        <!-- Delete Button with Modal -->
                        <x-validation
                            :action="route('articles.destroy', $article->article_id)" 
                            :method="'DELETE'" 
                            title="Delete Artikel" 
                            message="Apakah Anda yakin ingin menghapus artikel ini?" 
                            button-text="Delete"
                            cancel-text="Batal"
                            confirm-text="Ya, Hapus"
                            confirmButtonClass="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                        />
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
        <div class="flex justify ">
            <form method="GET" action="{{ route('articles.index') }}">
                <input type="hidden" name="search" value="{{ $search }}">
                <label for="perPage" class="mr-2">Number of rows:</label>
                <select id="perPage" name="perPage" onchange="this.form.submit()" class="border rounded px-2 py-1">
                    <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                </select>
            </form>
        </div>
        <div class="mt-4">
            {{ $articles->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div>
</div>
@endsection