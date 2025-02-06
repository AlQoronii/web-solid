@extends('layouts.dashboard')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">User</h1>
        @if(session('success'))
            <x-alert-popup type="success" :message="session('success')" />
        @endif

        @if(session('error'))
            <x-alert-popup type="error" :message="session('error')" />
        @endif

        <div class="flex justify-between mb-5">
            <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New User</a>
            {{-- <form method="GET" action="{{ route('users.index') }}" class="flex">
                <input type="text" name="search" placeholder="Search users..." value="{{ $search }}" class="px-4 py-2 border rounded-l">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button>
            </form> --}}
        </div>

        <table class="min-w-full bg-white">
            <thead class="bg-blue-100"> 
                <tr>
                    <th class="py-2 px-10 border-b text-left">Username</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Role</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
                <!-- Data akan dimuat di sini melalui JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usersTableBody = document.getElementById('usersTableBody');
            const editRouteTemplate = "{{ route('users.edit', ':id') }}";
            const showRouteTemplate = "{{ route('users.show', ':id') }}";
            const deleteRouteTemplate = "{{ route('users.destroy', ':id') }}";

            function fetchUsers() {
                fetch(`{{ url('/api/apiUsers') }}`)
                .then(response => response.json())
                .then(data => {
                    usersTableBody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan data baru
                    data.forEach(user => {
                        const editRoute = editRouteTemplate.replace(':id', user.user_id);
                        const showRoute = showRouteTemplate.replace(':id', user.user_id);
                        const deleteRoute = deleteRouteTemplate.replace(':id', user.user_id);

                        usersTableBody.innerHTML += `
                            <tr>
                                <td class="py-2 px-10 border-b text-left">${user.username}</td>
                                <td class="py-2 px-4 border-b text-left">${user.email}</td>
                                <td class="py-2 px-4 border-b text-left">${user.role ? user.role.name : 'N/A'}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Edit Button -->
                                        <a href="${editRoute}" class="text-yellow-500 hover:text-yellow-700 px-2 py-1 rounded inline-block text-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>

                                        <!-- Detail Button -->
                                        <a href="${showRoute}" class="text-blue-500 hover:text-blue-700 px-2 py-1 rounded inline-block text-center">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>

                                        <!-- Delete Button -->
                                        <form method="POST" action="${deleteRoute}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 px-2 py-1 rounded inline-block text-center">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching users:', error));
            }

            fetchUsers();
        });
    </script>
@endsection
