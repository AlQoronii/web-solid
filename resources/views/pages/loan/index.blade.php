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
        <div class="flex justify-between mb-5">
            <a href="{{ route('loans.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New Loan</a>
            {{-- <form method="GET" action="{{ route('loans.index') }}" class="flex">
                <input type="text" name="search" placeholder="Search loans..." value="{{ $search }}" class="px-4 py-2 border rounded-l">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button> --}}
        </div>
        <table class="min-w-full bg-white">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-2 px-10 border-b text-justify">User</th>
                    <th class="py-2 px-4 border-b text-justify">Book Name</th>
                    <th class="py-2 px-4 border-b text-center">Borrow Date</th>
                    <th class="py-2 px-4 border-b text-center">Return Date</th>
                    <th class="py-2 px-4 border-b text-center">Loan Status</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="loansTableBody">
                
            </tbody>
        </table>
        {{-- <div class="flex justify ">
            <form method="GET" action="{{ route('loans.index') }}">
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
            {{ $loans->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div> --}}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function (){
            const loansTableBody = document.getElementById('loansTableBody');
            const editRouteTemplate = "{{ route('loans.edit', ':id') }}";
            const showRouteTemplate = "{{ route('loans.show', ':id') }}";
            // const deleteRouteTemplate = "{{ route('loans.destroy', ':id') }}";


            function fetchLoans(){
                fetch(`{{ url('/api/apiLoans') }}`)    
                .then(response => response.json())
                .then(data => {
                    loansTableBody.innerHTML = '';
                    data.forEach(loan => {
                        const editRoute = editRouteTemplate.replace(':id', loan.loan_id);
                        const showRoute = showRouteTemplate.replace(':id', loan.loan_id);
                        // const deleteRoute = deleteRouteTemplate.replace(':id', loan.loan_id);

                        loansTableBody.innerHTML += `
                            <tr>
                                <td class="py-2 px-10 border-b text-justify">${ loan.user ? loan.user.username : 'N/A' }</td>
                                <td class="py-2 px-4 border-b text-justify">${ loan.book ? loan.book.book_title : 'N/A' }</td>
                                <td class="py-2 px-4 border-b text-center">${loan.borrow_date }</td>
                                <td class="py-2 px-4 border-b text-center">${loan.return_date }</td>
                                <td class="py-2 px-4 border-b text-center">${loan.loan_status }</td>
                                <td class="py-2 px-4 border-b text-center">
                                    <div class="flex justify-center space-x-2">
                                    <a href="${editRoute}" 
                                        class="w-auto text-yellow-500 hover:text-yellow-700 px-2 py-1 rounded inline-block text-center"
                                    >
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    </a>
                                </div>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching loans:', error));
            }

            fetchLoans();
        });
    </script>
@endsection

