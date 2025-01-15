@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
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
