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
        <div class="w-full bg-white border p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Loan</h1>
            <form id="editForm">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">User <span class="text-red-500">*</span></label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="book_id" class="block text-gray-700 font-bold mb-2">Book <span class="text-red-500">*</span></label>
                    <select id="book_id" name="book_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="borrow_date" class="block text-gray-700 font-bold mb-2">Borrow Date <span class="text-red-500">*</span></label>
                    <input type="date" id="borrow_date" name="borrow_date"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="return_date" class="block text-gray-700 font-bold mb-2">Return Date <span class="text-red-500">*</span></label>
                    <input type="date" id="return_date" name="return_date"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="loan_status" class="block text-gray-700 font-bold mb-2">Loan Status <span class="text-red-500">*</span></label>
                    <select id="loan_status" name="loan_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                </div>
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/loans/' . $loan" 
                    :method="'POST'"
                    :formId="'editForm'"
                    :href="'/loans'" 
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
<script>
    document.addEventListener('DOMContentLoaded', async function (){
        const userSelect = document.getElementById('user_id');
        const bookSelect = document.getElementById('book_id');
        const borrowDateInput = document.getElementById('borrow_date');
        const returnDateInput = document.getElementById('return_date');
        const loanStatusSelect = document.getElementById('loan_status');
        const editForm = document.getElementById('editForm');
        const loanId = "{{ $loan }}";
        const token = localStorage.getItem('auth_token');

        console.log(loanId);
        try{
            const userResponse = await fetch("{{ url('api/apiUsers') }}", {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
                
            });
            if(!userResponse.ok) throw new Error("Failed to fetch users");
            const users = await userResponse.json();
            userSelect.innerHTML = '';
            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.user_id;
                option.textContent = user.username;
                userSelect.appendChild(option);
            });

            const bookResponse = await fetch("{{ url('api/apiBooks') }}", {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });
            if(!bookResponse.ok) throw new Error("Failed to fetch books");
            const books = await bookResponse.json();
            bookSelect.innerHTML = '';
            books.forEach(book => {
                const option = document.createElement('option');
                option.value = book.book_id;
                option.textContent = book.book_title;
                bookSelect.appendChild(option);
            });

            const loanResponse = await fetch(`{{ url('api/apiLoans') }}/${loanId}`, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });
            if(!loanResponse.ok) throw new Error("Failed to fetch loan");
            const loan = await loanResponse.json();
            document.getElementById('user_id').value = loan.user_id;
            document.getElementById('book_id').value = loan.book_id;
            document.getElementById('borrow_date').value = loan.borrow_date;
            document.getElementById('return_date').value = loan.return_date;
            document.getElementById('loan_status').value = loan.loan_status;

            const loanStatusOptions = ['borrowed', 'returned'];
            loanStatusSelect.innerHTML = '';
            loanStatusOptions.forEach(status => {
                const option = document.createElement('option');
                option.value = status;
                option.textContent = status;
                loanStatusSelect.appendChild(option);
            });
            loanStatusSelect.value = loan.loan_status;
        }catch(error){
            console.error('Error:', error); 
        }
    });
</script>
@endsection