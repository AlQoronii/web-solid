@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg border-2 rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Create User</h1>
            <form id="createForm">
                @csrf
                <div class="mb-4">
                    <label for="role_id" class="block text-gray-700 font-bold mb-2">Role</label>
                    <select id="role_id" name="role_id" class="w-full px-3 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </select>
                    <span class="text-red-500 text-sm" id="roleError"></span>
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-bold ">Username<span class="text-red-500">*</span></label>
                    <input type="text" name="username" id="username" class="w-full p-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span class="text-red-500 text-sm" id="usernameError"></span>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold">Email<span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" class="w-full p-2 border-2  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span class="text-red-500 text-sm" id="emailError"></span>
                </div>
                <div x-data="{ showPassword: false }" class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold">Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" id="password" class="w-full p-2 border-2  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg :class="{'hidden': showPassword, 'block': !showPassword }" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.737 2.057-1.358 2.958M15 12a3 3 0 01-6 0m6 0a3 3 0 01-6 0m6 0a3 3 0 01-6 0" />
                            </svg>
                            <svg :class="{'block': showPassword, 'hidden': !showPassword }" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.358-2.958m1.358-2.958A10.05 10.05 0 0112 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.737 2.057-1.358 2.958M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <span class="text-red-500 text-sm" id="passwordError"></span>
                </div>
                <div x-data="{ showPassword: false }" class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-bold">Confirm Password <span class="text-red-500">*</span></label>
                    <span class="text-red-500 text-sm" id="password_confirmationError"></span>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" class="w-full p-2 border-2  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg :class="{'hidden': showPassword, 'block': !showPassword }" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.737 2.057-1.358 2.958M15 12a3 3 0 01-6 0m6 0a3 3 0 01-6 0m6 0a3 3 0 01-6 0" />
                            </svg>
                            <svg :class="{'block': showPassword, 'hidden': !showPassword }" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.358-2.958m1.358-2.958A10.05 10.05 0 0112 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.737 2.057-1.358 2.958M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-validation
                    buttonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                    :action="'http://127.0.0.1:8000/api/users'" 
                    :method="'POST'" 
                    :formId="'createForm'"
                    title="Tambah User" 
                    message="Apakah Anda yakin ingin menambah user ini?" 
                    button-text="Submit"
                    :href="'/users'"
                    cancel-text="Batal"
                    confirm-text="Ya, Tambahkan"
                    confirmButtonClass="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"
                />  
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function (){
            fetch('http://127.0.0.1:8000/api/roles')
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById('role_id');
                data.forEach(role => {
                    let option = document.createElement('option');
                    option.value = role.role_id;
                    option.text = role.name;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching roles', error));
        });
    </script>
</div>
@endsection