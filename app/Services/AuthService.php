<?php
// filepath: /d:/Project/web-solid/app/Services/AuthService.php
namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use App\Services\Notifications\NotificationPusher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\AuthenticationException;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($request)
    {
        try {
            $validator = Validator::make($request->all(), $request->rules());
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $credentials = $validator->validated();
            $user = $this->authRepository->findUserByEmail($credentials['email']);
            if (!$user) {
                return ['status' => false, 'message' => 'Email is not registered'];
            } elseif (!Hash::check($credentials['password'], $user->password)) {
                return ['status' => false, 'message' => 'Password is incorrect'];
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            session()->regenerate();
            Auth::login($user);

            return ['status' => true, 'message' => 'Login success', 'token' => $token];
        } catch (ValidationException $e) {
            return ['status' => false, 'message' => 'Validation failed', 'errors' => $e->errors()];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'An error occurred during login', 'error' => $e->getMessage()];
        }
    }

    public function logout(Request $request): bool
    {
        try {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}