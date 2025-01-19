<?php
// filepath: /d:/Project/web-solid/app/Repositories/Contracts/AuthRepositoryInterface.php
namespace App\Repositories;

use App\Models\User;
use GuzzleHttp\Psr7\Request;

interface AuthRepositoryInterface
{
    public function login(Request $request);
    public function logout(Request $request);
    public function findUserByEmail(string $email): ?User;
}