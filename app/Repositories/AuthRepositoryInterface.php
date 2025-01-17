<?php
// filepath: /d:/Project/web-solid/app/Repositories/Contracts/AuthRepositoryInterface.php
namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function findUserByEmail(string $email);
}