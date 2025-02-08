@extends('layouts.dashboard')
@section('content')
    <div class="bg-blue-50 rounded-lg">
        <div class="p-5">
            <h1 class="text-2xl font-medium mb-5">Books</h1>
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>                          
                        <span class="pl-4">Dashboard</span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                        <a href="{{ route('books.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Books</a>
                    </div>
                </li>
            </ol>
        </nav>
        </div>
    </div>

    <div class="container mx-auto mt-10">
        
        

        <div class="flex justify-between mb-5">
            <a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New Book</a>
            <form method="GET" action="{{ route('books.index') }}" class="flex">
                <input type="text" name="search" placeholder="Search users..." class="px-4 py-2 border rounded-l">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button>
            </form>
        </div>
        <div class="mt-4 bg-white p-8 rounded-lg shadow-lg border">
            <table class="min-w-full border rounde bg-white">
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
        {{-- <form id="paginationForm">
            <input type="hidden" name="search" id="searchInput">
            <label for="perPage">Number of rows:</label>
            <select id="perPage" name="perPage" class="border rounded px-2 py-1">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </form> --}}
        
        
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', async () => {
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
                                        <!-- Delete Button -->
                                        <button data-book-id="${book.book_id}" class="delete-button w-auto text-red-500 hover:text-red-700 px-2 py-1 rounded inline-block text-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching books:', error));
        }

        fetchBooks();

        // Event delegation for delete buttons
        booksTableBody.addEventListener('click', function(event) {
            if (event.target.closest('.delete-button')) {
                const bookId = event.target.closest('.delete-button').dataset.bookId;
                const modalContainer = document.createElement('div');
                modalContainer.classList.add('modal-container');
                modalContainer.innerHTML = `
                    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
                        <div class="bg-white rounded-lg p-6 shadow-lg w-96">
                            <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
                            <p class="mb-6">Apakah Anda yakin ingin menghapus buku ini?</p>
                            <div class="flex justify-end space-x-4">
                                <button class="close-modal bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                                    Batal
                                </button>
                                <button class="confirm-delete bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600" data-id="${bookId}">
                                    Konfirmasi
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                document.body.appendChild(modalContainer);

                document.querySelector('.close-modal').addEventListener('click', () => {
                    modalContainer.remove();
                });

                document.querySelector('.confirm-delete').addEventListener('click', function() {
                    deleteBook(this.dataset.id);
                });
            }
        });

        // Function to handle book deletion
        function deleteBook(bookId) {
            const deleteUrl = deleteUrlTemplate.replace(':id', bookId);
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    // alert('Book deleted successfully');
                    fetchBooks(); // Refresh list buku setelah dihapus
                    // Display success message using custom alert component
                    const successMessage = document.createElement('div');
                    successMessage.innerHTML = `<x-alert-popup type="success" message="Book deleted successfully" />`;
                    document.querySelector('.container').prepend(successMessage);
                    document.querySelector('.modal-container').remove(); // Hapus modal setelah delete berhasil
                } else {
                    console.error('Failed to delete book');
                }
            })
            .catch(error => console.error('Error deleting book:', error));
        }
    });
        
        
    </script>
@endsection
