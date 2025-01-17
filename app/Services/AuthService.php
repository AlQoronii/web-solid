<?php
// filepath: /d:/Project/web-solid/app/Services/AuthService.php
namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(array $credentials)
    {
        $user = $this->authRepository->findUserByEmail($credentials['email']);

        if (!$user) {
            return ['error' => 'Email not found'];
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return ['error' => 'Password is incorrect'];
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return ['token' => $token, 'user' => $user];
    }
}