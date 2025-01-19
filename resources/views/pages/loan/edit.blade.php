@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('loans.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="w-full bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Loan</h1>
            <form action="{{ route('loans.update', $loan->loan_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">User <span class="text-red-500">*</span></label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($users as $user)
                            <option value="{{ $user->user_id }}" {{ $loan->user_id == $user->user_id ? 'selected' : '' }}>{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="book_id" class="block text-gray-700 font-bold mb-2">Book <span class="text-red-500">*</span></label>
                    <select id="book_id" name="book_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($books as $book)
                            <option value="{{ $book->book_id }}" {{ $loan->book_id == $book->book_id ? 'selected' : '' }}>{{ $book->book_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="borrow_date" class="block text-gray-700 font-bold mb-2">Borrow Date <span class="text-red-500">*</span></label>
                    <input type="date" id="borrow_date" name="borrow_date" value="{{ $loan->borrow_date }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="return_date" class="block text-gray-700 font-bold mb-2">Return Date <span class="text-red-500">*</span></label>
                    <input type="date" id="return_date" name="return_date" value="{{ $loan->return_date }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="loan_status" class="block text-gray-700 font-bold mb-2">Loan Status <span class="text-red-500">*</span></label>
                    <select id="loan_status" name="loan_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="borrowed" {{ $loan->loan_status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                        <option value="returned" {{ $loan->loan_status == 'returned' ? 'selected' : '' }}>Returned</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="route('loans.update', $loan->loan_id)" 
                    :method="'PUT'" 
                    title="Update Loann" 
                    message="Apakah Anda yakin ingin mengupdate data peminjaman ini?" 
                    button-text="Update"
                    cancel-text="Batal"
                    confirm-text="Ya, Update"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection