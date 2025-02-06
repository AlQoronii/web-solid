<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class ApiUsers extends Controller{
    private $usersService;

    public function __construct(UserService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function loadAllUsers()
    {
        $users = $this->usersService->getAll(); // Pastikan relasi dimuat
        return response()->json($users);
    }   

    public function show($id)
    {
        $user = $this->usersService->getById($id);
        if (!$user) {
            response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);    
    }
    
}

?>