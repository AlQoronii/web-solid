<!-- filepath: /d:/Project/web-solid/resources/views/livewire/articles-table.blade.php -->
<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="Search articles..." class="form-control mb-3">

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Content</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td class="py-2 px-4 border-b">{{ $article->article_id }}</td>
                <td class="py-2 px-4 border-b">{{ $article->article_title }}</td>
                <td class="py-2 px-4 border-b">{{ $article->article_content }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('articles.show', $article->article_id) }}" class="btn btn-info bg-blue-500 text-white px-2 py-1 rounded">View</a>
                    <a href="{{ route('articles.edit', $article->article_id) }}" class="btn btn-warning bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('articles.destroy', $article->article_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>