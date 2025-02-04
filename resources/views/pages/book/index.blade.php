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
                    <th class="py-2 px-10 border-b text-justify">Category</th>
                    <th class="py-2 px-4 border-b text-justify">Title</th>
                    <th class="py-2 px-4 border-b text-justify">Author</th>
                    <th class="py-2 px-4 border-b text-justify">Publisher</th>
                    <th class="py-2 px-4 border-b text-justify">Year</th>
                    <th class="py-2 px-4 border-b text-center">Image</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td class="py-2 px-10 border-b text-justify">{{ $book->category ? $book->category->category_name : 'N/A' }}</td>
                    <td class="py-2 px-4 border-b text-justify">{{ $book->book_title }}</td>
                    <td class="py-2 px-4 border-b text-justify">{{ $book->book_author }}</td>
                    <td class="py-2 px-4 border-b text-justify">{{ $book->book_publisher }}</td>
                    <td class="py-2 px-4 border-b text-justify">{{ $book->book_year }}</td>
                    <td class="py-2 px-4 border-b text-justify">
                    @if($book->book_image != null)
                        <img src="{{ asset('storage/books/images/' . $book->book_image) }}" alt="Book Image" class="w-16 h-16 mx-auto">
                    @else
                        <img src="{{ asset('assets/images/library-books.jpg') }}" alt="Default Image" class="w-16 h-16 mx-auto">
                    @endif
                </td>
                <td class="py-2 px-4 border-b text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('books.edit', $book->book_id) }}" 
                            class="w-auto text-yellow-500 hover:text-yellow-700 px-2 py-1 rounded inline-block text-center"
                        >
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                          </svg>
                        </a>
                
                        <!-- Detail Button -->
                        <a href="{{ route('books.show', $book->book_id) }}" 
                            class="w-auto text-blue-500 hover:text-blue-700 px-2 py-1 rounded inline-block text-center"
                        >
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>
                          
                        </a>
                        
                        <x-validation
                            :action="'http://127.0.0.1:8000/api/books/' . $book->book_id" 
                            :method="'DELETE'" 
                            title="Delete Book" 
                            message="Apakah Anda yakin ingin menghapus book ini?" 
                            {{-- button-text="Delete" --}}
                            :svgIcon="true"
                            :href="'/books'"
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
