@extends('layouts.dashboard')
@section('content')
    <div class="bg-blue-50 rounded-lg">
        <div class="p-5">
            <h1 class="text-2xl font-medium mb-5">Users</h1>
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>                          
                        <span class="pl-4">Dashboard</span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                        <a href="{{ route('users.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Users</a>
                    </div>
                </li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="container mx-auto mt-10">
        <div class="flex justify-between mb-5">
            <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add New User</a>
            <form method="GET" action="{{ route('users.index') }}" class="flex">
                <input type="text" name="search" placeholder="Search users..."  class="px-4 py-2 border rounded-l">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-700">Search</button>
            </form>
        </div>

        <div class="mt-4 bg-white p-8 rounded-lg shadow-lg border">
            <table class="min-w-full border bg-white">
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
       
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usersTableBody = document.getElementById('usersTableBody');
            const editRouteTemplate = "{{ route('users.edit', ':id') }}";
            const showRouteTemplate = "{{ route('users.show', ':id') }}";
            const deleteUrlTemplate = 'http://127.0.0.1:8000/api/users/:id';


            function fetchUsers() {
                fetch(`{{ url('/api/apiUsers') }}`)
                .then(response => response.json())
                .then(data => {
                    usersTableBody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan data baru
                    data.forEach(user => {
                        const editRoute = editRouteTemplate.replace(':id', user.user_id);
                        const showRoute = showRouteTemplate.replace(':id', user.user_id);
                        const deleteRoute = deleteUrlTemplate.replace(':id', user.user_id);

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
                                        <button data-user-id="${user.user_id}" class="delete-button w-auto text-red-500 hover:text-red-700 px-2 py-1 rounded inline-block text-center">
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
                .catch(error => console.error('Error fetching users:', error));
            }

            fetchUsers();
            usersTableBody.addEventListener('click', function(event) {
                if (event.target.closest('.delete-button')) {
                    const userId = event.target.closest('.delete-button').dataset.userId;
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
                                    <button class="confirm-delete bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600" data-id="${userId}">
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
                        deleteUser(this.dataset.id);
                    });
                }
            });

        // Function to handle book deletion
            function deleteUser(userId) {
                const deleteUrl = deleteUrlTemplate.replace(':id', userId);
                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('User deleted successfully');
                        fetchUsers(); // Refresh list buku setelah dihapus
                        document.querySelector('.modal-container').remove(); // Hapus modal setelah delete berhasil
                    } else {
                        console.error('Failed to delete user');
                    }
                })
                .catch(error => console.error('Error deleting user:', error));
            }
        });

    </script>
@endsection
