@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back
    </a>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div>
                    <h1 class="text-gray-700 font-bold mb-1"><strong>Username: </strong><span id="username"></span></h1>
                    <p class="text-gray-700 mb-1"><strong>Role ID: </strong><span id="role-name"></span></p>
                    <p class="text-gray-700 mb-1"><strong>Email: </strong><span id="email"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', async function() {
        try {
            const userId = "{{ $user }}";
            console.log('User ID:', userId);
            const userResponse = await fetch(`{{url('api/apiUsers/${userId}')}}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            });

            if (!userResponse.ok) throw new Error('Failed to fetch user data');
            const user = await userResponse.json();
            console.log('User Data:', user);

            document.getElementById('username').textContent = user.username;
            document.getElementById('role-name').textContent = user.role.name;
            document.getElementById('email').textContent = user.email;
        } catch (error) {
            console.error('Error fetching user data:', error);
        }
    });
</script>
@endsection
