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
                    <h1 class="text-2xl font-bold mb-2">{{ $user->username }}</h1>
                    <p class="text-gray-700 mb-1"><strong>Role ID:</strong> {{ $user->role_id }}</p>
                    <p class="text-gray-700 mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-gray-700 mb-1"><strong>Password:</strong> {{ $user->password }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
