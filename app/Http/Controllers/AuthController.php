<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use App\Services\Notifications\NotificationPusher;
use App\Services\UserService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Js;
use Intervention\Image\Colors\Rgb\Channels\Red;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct( AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $response = $this->authService->login($request);

            if (!$response['status']) {
                NotificationPusher::error($response['message']);
                return back()->withErrors(['login' => $response['message']]);
            }

            // NotificationPusher::success($response['message'], ['token' => $response['token']]);
            // return redirect()->intended('dashboard');
            return response()->json($response);
        } catch (\Exception $e) {
            NotificationPusher::error('An unexpected error occurred');
            return back()->withErrors(['login' => 'An unexpected error occurred']);
        }
    }
    
    public function logout(Request $request): JsonResponse | RedirectResponse
    {
        try {
            $repsonse = $this->authService->logout($request);
            if (!$repsonse) {
                throw new AuthenticationException('Logout failed');
            }
            NotificationPusher::success('Logout success');
            // return response()->redirectTo('/');
            return response()->json(['message' => 'Logout success']);
        } catch (\Exception $e) {
            NotificationPusher::error($e->getMessage());
            return back();
        }
    }
}

