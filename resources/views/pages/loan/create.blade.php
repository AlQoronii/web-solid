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
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Create Loan</h1>
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">User</label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($users as $user)
                            <option value="{{ $user->user_id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="book_id" class="block text-gray-700 font-bold mb-2">Book</label>
                    <select id="book_id" name="book_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($books as $book)
                            <option value="{{ $book->book_id }}">{{ $book->book_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="borrow_date" class="block text-gray-700">Borrow Date</label>
                    <input type="date" name="borrow_date" id="borrow_date" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                </div>
                <div class="mb-4">
                    <label for="return_date" class="block text-gray-700">Return Date</label>
                    <input type="date" name="return_date" id="return_date" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                </div>
                <div class="mb-4">
                    <label for="loan_status" class="block text-gray-700">Loan Status</label>
                    <select id="loan_status" name="loan_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="borrowed">Borrowed</option>
                        <option value="returned">Returned</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
