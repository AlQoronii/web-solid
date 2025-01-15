@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Create User</h1>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="role_id" class="block text-gray-700 font-bold mb-2">Role</label>
                    <select id="rold_id" name="role_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <?php
                        // dd($categories);
                    ?>
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection