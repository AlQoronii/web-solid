@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <a href="{{ route('loans.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg border rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Create Loan</h1>
            <form id="createForm">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">User <span class="text-red-500">*</span></label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="book_id" class="block text-gray-700 font-bold mb-2">Book <span class="text-red-500">*</span></label>
                    <select id="book_id" name="book_id" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="borrow_date" class="block text-gray-700">Borrow Date <span class="text-red-500">*</span></label>
                    <input type="date" name="borrow_date" id="borrow_date" class="w-full p-2 border-2 border-gray-300 rounded mt-1" required>
                </div>
                <div class="mb-4">
                    <label for="return_date" class="block text-gray-700">Return Date <span class="text-red-500">*</span></label>
                    <input type="date" name="return_date" id="return_date" class="w-full p-2 border-2 border-gray-300 rounded mt-1" required>
                </div>
                <div class="mb-4">
                    <label for="loan_status" class="block text-gray-700">Loan Status <span class="text-red-500">*</span></label>
                    <select id="loan_status" name="loan_status" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="borrowed">Borrowed</option>
                        <option value="returned">Returned</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/loans'" 
                    :method="'POST'" 
                    :formId="'createForm'"
                    title="Tambah Loan" 
                    message="Apakah Anda yakin ingin menambah peminjaman ini?" 
                    button-text="Submit"
                    :href="'/loans'"
                    cancel-text="Batal"
                    confirm-text="Ya, Tambahkan"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
                </div>
            </form>
        </div>
    </div>
</div>

<script> 
    document.addEventListener('DOMContentLoaded', function (){
        const userSelect = document.getElementById('user_id');
        const bookSelect = document.getElementById('book_id');
        fetch(`{{ url('/api/apiUsers') }}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(user => {
                userSelect.innerHTML += `<option value="${user.user_id}">${user.username}</option>`;
            });
        });

        fetch(`{{ url('/api/apiBooks') }}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(book => {
                bookSelect.innerHTML += `<option value="${book.book_id}">${book.book_title}</option>`;
            });
        });
    });
</script>
@endsection
