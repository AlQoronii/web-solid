@extends('layouts.dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Loans</h1>
        @if(session('success'))
            <x-alert-popup type="success" :message="session('success')" />
        @endif

        @if(session('error'))
            <x-alert-popup type="error" :message="session('error')" />
        @endif
        <div class="mb-5">
            <a href="{{ route('loans.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New Loan</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">User</th>
                    <th class="py-2 px-4 border-b text-center">Book Name</th>
                    <th class="py-2 px-4 border-b text-center">Borrow Date</th>
                    <th class="py-2 px-4 border-b text-center">Return Date</th>
                    <th class="py-2 px-4 border-b text-center">Loan Status</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $loan->user->username }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $loan->book->book_title }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $loan->borrow_date }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $loan->return_date }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $loan->loan_status }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('loans.edit', $loan->loan_id) }}" class="bg-yellow-400 text-yellow-900 px-2 py-1 rounded hover:bg-yellow-500" style="width: 60px; display: inline-block; text-align: center; font-">Edit</a>
                        {{-- <a href="{{ route('loans.show', $loan->loan_id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700" style="width: 60px; display: inline-block; text-align: center;">Show</a> --}}
                        <x-validation
                            :action="route('loans.destroy', $loan->loan_id)" 
                            :method="'DELETE'" 
                            title="Delete Loan" 
                            message="Apakah Anda yakin ingin menghapus loan ini?" 
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
    </div>
@endsection

