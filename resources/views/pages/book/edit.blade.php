@extends('layouts.dashboard')

@section('content')
<div class="bg-white">
    <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>

    <div class="container mx-auto p-4">
        <div class="w-full bg-white p-8 border rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Book</h1>

            <form id="editFileForm" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-bold mb-2">Category <span class="text-red-500">*</span></label>
                    <select id="category_id" name="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <!-- Data categories akan diisi dari API -->
                    </select>
                </div>

                <div class="mb-4">
                    <label for="book_title" class="block text-gray-700 font-bold mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="book_title" name="book_title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="book_author" class="block text-gray-700 font-bold mb-2">Author <span class="text-red-500">*</span></label>
                    <input type="text" id="book_author" name="book_author" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="book_publisher" class="block text-gray-700 font-bold mb-2">Publisher <span class="text-red-500">*</span></label>
                    <input type="text" id="book_publisher" name="book_publisher" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="book_year" class="block text-gray-700 font-bold mb-2">Year <span class="text-red-500">*</span></label>
                    <input type="number" id="book_year" name="book_year" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <x-input-file 
                    label="Book Image" 
                    name="book_image" 
                    id="book_image"
                    src="{{ isset($book->book_image) ? asset('storage/books/images/' . $book->book_image) : null }}" 
                    placeholderText="SVG, PNG, JPG or GIF (MAX. 800x400px)" 
                />

                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/books/' . $book" 
                    :method="'POST'" 
                    :formId="'editFileForm'"
                    title="Edit Buku" 
                    message="Apakah Anda yakin ingin mengubah buku ini?" 
                    button-text="Submit"
                    :href="'/books'"
                    cancel-text="Batal"
                    confirm-text="Ya, Ubah"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const imageBaseURL = "{{ asset('storage/books/images') }}";
        const token = localStorage.getItem('auth_token');
        const bookId = "{{ $book }}"; // Ambil ID buku dari Blade
        console.log("Book ID:", bookId);

        try {
            // Fetch kategori terlebih dahulu
            const categoryResponse = await fetch('http://127.0.0.1:8000/api/apiCategories', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            if (!categoryResponse.ok) throw new Error("Failed to fetch categories");
            const categories = await categoryResponse.json();

            const categorySelect = document.getElementById('category_id');
            categorySelect.innerHTML = ""; // Kosongkan dropdown

            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.category_id;
                option.textContent = category.category_name;
                categorySelect.appendChild(option);
            });

            // Fetch data buku setelah kategori tersedia
            const bookResponse = await fetch(`http://127.0.0.1:8000/api/apiBooks/${bookId}`, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            if (!bookResponse.ok) throw new Error("Failed to fetch book data");
            const book = await bookResponse.json();
            console.log("Book Data:", book);

            // Isi data buku ke form
            document.getElementById('category_id').value = book.category_id;
            document.getElementById('book_title').value = book.book_title;
            document.getElementById('book_author').value = book.book_author;
            document.getElementById('book_publisher').value = book.book_publisher;
            document.getElementById('book_year').value = book.book_year;

            // Tampilkan gambar jika ada
            if (book.book_image) {
                const bookImageElement = document.getElementById('preview-book_image'); // Elemen img untuk preview
                bookImageElement.src = `${imageBaseURL}/${book.book_image}`;
                bookImageElement.classList.remove('hidden'); // Pastikan gambar terlihat

                // Sembunyikan placeholder
                const placeholderElement = document.getElementById('placeholder-book_image');
                if (placeholderElement) {
                    placeholderElement.classList.add('hidden');
                }

                console.log('Image found and displayed');
            }

        } catch (error) {
            console.error('Error fetching data:', error);
        }
    });
</script>

@endsection
