@extends('layouts.dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Article</h1>
        <div class="mb-5">
            <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Article</a>
        
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">ID</th>
                    <th class="py-2 px-4 border-b text-center">Title</th>
                    <th class="py-2 px-4 border-b text-center">Content</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $article->article_id }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $article->article_title }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $article->article_content }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('articles.edit', $article->article_id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-700" style="width: 60px; display: inline-block; text-align: center;">Edit</a>
                        <a href="{{ route('articles.show', $article->article_id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700" style="width: 60px; display: inline-block; text-align: center;">Show</a>
                        <form action="{{ route('articles.destroy', $article->article_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 ml-2" style="width: 60px; display: inline-block; text-align: center;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection