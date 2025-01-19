@extends('layouts.dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Books</h1>
        
        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white px-4 py-2 rounded mb-5">
            {{ session('success') }}
            </div>
            <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 2000);
            </script>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded mb-5">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-5">
            <a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New Book</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Category</th>
                    <th class="py-2 px-4 border-b text-center">Title</th>
                    <th class="py-2 px-4 border-b text-center">Author</th>
                    <th class="py-2 px-4 border-b text-center">Publisher</th>
                    <th class="py-2 px-4 border-b text-center">Year</th>
                    <th class="py-2 px-4 border-b text-center">Image</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($book as $book)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $book->category ? $book->category->category_name : 'N/A' }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_title }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_author }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_publisher }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_year }}</td>
                    <td class="py-2 px-4 border-b text-center"><img src="{{ asset('storage/books/images/' . $book->book_image) }}" alt="Book Image" class="w-16 h-16 mx-auto"></td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('books.edit', $book->book_id) }}" class="bg-yellow-400 text-yellow-900 px-2 py-1 rounded hover:bg-yellow-700" style="width: 60px; display: inline-block; text-align: center;">Edit</a>
                        <a href="{{ route('books.show', $book->book_id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700" style="width: 60px; display: inline-block; text-align: center;">Detail</a>
                        <form action="{{ route('books.destroy', $book->book_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700" style="width: 60px; display: inline-block; text-align: center;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
