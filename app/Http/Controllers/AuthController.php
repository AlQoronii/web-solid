<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\Notifications\NotificationPusher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    // private $notificationPusher;
    // public function __construct(NotificationPusher $notificationPusher)
    // {
    //     $this->notificationPusher = $notificationPusher;
    // }

    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->validated();

    //     // Cari user berdasarkan email
    //     $user = User::where('email', $credentials['email'])->first();

    //     // Verifikasi password
    //     if (!$user || !Hash::check($credentials['password'], $user->password)) {
    //         return $this->notificationPusher->error('Unauthorized', 401);
    //     }

    //     // Buat token untuk user
    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     $this->notificationPusher->success('Login success', ['token' => $token]);   
    //     return response()->redirectTo('dashboard');
    // }

    // public function create(): \Illuminate\Contracts\View\View
    // {
    //     return view('pages.auth.login');
    // }

    // public function logout()
    // {
    //     auth()->user()->tokens()->delete();

    //     return $this->notificationPusher->success('Logout success');
    // }

    public function create()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(LoginRequest $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

