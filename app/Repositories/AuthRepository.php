<?php
// filepath: /d:/Project/web-solid/app/Repositories/AuthRepository.php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function findUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}