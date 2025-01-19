<?php
// filepath: /d:/Project/web-solid/app/Repositories/AuthRepository.php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use GuzzleHttp\Psr7\Request;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(Request $request)
    {
        
    }

    public function logout(Request $request)
    {
        
    }

    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}