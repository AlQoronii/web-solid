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
            <tbody id="booksTableBody">
                <!-- Books will be dynamically inserted here -->
            </tbody>
        </table>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const booksTableBody = document.getElementById('booksTableBody');

        // Base URLs generated using Blade
        const imageBaseURL = "{{ asset('storage/books/images/') }}";
        const defaultImage = "{{ asset('assets/images/library-books.jpg') }}";
        const editRouteTemplate = "{{ route('books.edit', ':id') }}";  // Template with placeholder ':id'
        const showRouteTemplate = "{{ route('books.show', ':id') }}";  // Template with placeholder ':id'
        const deleteUrlTemplate = 'http://127.0.0.1:8000/api/books/:id';


        function fetchBooks() {
            fetch(`http://127.0.0.1:8000/api/apiBooks`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Log the fetched books data
                    booksTableBody.innerHTML = '';
                    data.forEach(book => {
                        // Replace ':id' in route templates with actual book ID
                        const editRoute = editRouteTemplate.replace(':id', book.book_id);
                        const showRoute = showRouteTemplate.replace(':id', book.book_id);
                        const deleteUrl = deleteUrlTemplate.replace(':id', book.book_id);

                        booksTableBody.innerHTML += `
                            <tr>
                                <td class="py-2 px-10 border-b text-justify">${book.category ? book.category.category_name : 'N/A'}</td>
                                <td class="py-2 px-4 border-b text-justify">${book.book_title}</td>
                                <td class="py-2 px-4 border-b text-justify">${book.book_author}</td>
                                <td class="py-2 px-4 border-b text-justify">${book.book_publisher}</td>
                                <td class="py-2 px-4 border-b text-justify">${book.book_year}</td>
                                <td class="py-2 px-4 border-b text-justify">
                                    <img src="${book.book_image ? `${imageBaseURL}/${book.book_image}` : `${defaultImage}`}" alt="Book Image" class="w-16 h-16 mx-auto">
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Edit Link -->
                                        <a href="${editRoute}" class="w-auto text-yellow-500 hover:text-yellow-700 px-2 py-1 rounded inline-block text-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <!-- Show Link -->
                                        <a href="${showRoute}" class="w-auto text-blue-500 hover:text-blue-700 px-2 py-1 rounded inline-block text-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                        <a href="${deleteUrl}" class="w-auto text-red-500 hover:text-red-700 px-2 py-1 rounded inline-block text-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                        <!-- Delete Confirmation Link -->
                                         <x-validation
                                        //     :action="deleteUrl"
                                        //     :method="'DELETE'"
                                        //     title="Delete Buku"
                                        //     formId="null"
                                        //     message="Apakah Anda yakin ingin menghapus buku ini?"
                                        //     button-text="Submit"
                                        //     :href="'/books'"
                                        //     cancel-text="Batal"
                                        //     confirm-text="Ya, Hapus"
                                        //     confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                                        // />
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching books:', error));
        }

        fetchBooks();
    });
</script>

    
@endsection
