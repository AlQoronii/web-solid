@extends('layouts.dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Books</h1>
        
        @if(session('success'))
            <x-alert-popup type="success" :message="session('success')" />
        @endif

        @if(session('error'))
            <x-alert-popup type="error" :message="session('error')" />
        @endif

        <div class="flex justify-between mb-5">
            <a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New Book</a>
            <form method="GET" action="{{ route('books.index') }}" class="flex">
                <input type="text" name="search" placeholder="Search books..." value="{{ $search }}" class="px-4 py-2 border rounded-l">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button>
            </form>
        </div>
        <table class="min-w-full bg-white">
            <thead class="bg-blue-100 text-black">
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
                @foreach($books as $book)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $book->category ? $book->category->category_name : 'N/A' }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_title }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_author }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_publisher }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->book_year }}</td>
                    <td class="py-2 px-4 border-b text-center">
                    @if($book->book_image != null)
                        <img src="{{ asset('storage/books/images/' . $book->book_image) }}" alt="Book Image" class="w-16 h-16 mx-auto">
                    @else
                        <img src="{{ asset('assets/images/library-books.jpg') }}" alt="Default Image" class="w-16 h-16 mx-auto">
                    @endif
                </td><td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('books.edit', $book->book_id) }}" class="bg-yellow-400 text-yellow-900 px-2 py-1 rounded hover:bg-yellow-500" style="width: 60px; display: inline-block; text-align: center;">Edit</a>
                        <a href="{{ route('books.show', $book->book_id) }}" class="bg-blue-500 text-blue-900 px-2 py-1 rounded hover:bg-blue-500" style="width: 60px; display: inline-block; text-align: center;">Detail</a>
                        <x-validation
                            :action="route('books.destroy', $book->book_id)" 
                            :method="'DELETE'" 
                            title="Delete Book" 
                            message="Apakah Anda yakin ingin menghapus book ini?" 
                            button-text="Delete"
                            cancel-text="Batal"
                            confirm-text="Ya, Hapus"
                            confirmButtonClass="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                        />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify ">
            <form method="GET" action="{{ route('books.index') }}">
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
            {{ $books->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div>
    </div>
@endsection
