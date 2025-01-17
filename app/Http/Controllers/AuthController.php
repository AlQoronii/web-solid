<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\Notifications\NotificationPusher;
use App\Services\UserService;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{


    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        // Cari user berdasarkan email

        if($user = User::where('email', $credentials['email'])->first()){
            if (!Hash::check($credentials['password'], $user->password)) {
                // response()->json(['error' => 'Unauthorized'], 401);
                NotificationPusher::error('Password is incorrect');
                return redirect()->back();
            }
         // Buat token untuk user
         $token = $user->createToken('auth_token')->plainTextToken;

         NotificationPusher::success('Login success', ['token' => $token]);
         return redirect()->intended('dashboard');
        }else{
            NotificationPusher::error('Email is not registered');
            return redirect()->back();
        }

       
        
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('pages.auth.login');
    }

    

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return view('pages.landing-page.index')->with(NotificationPusher::success('Logout success'));
    }

    // public function create()
    // {
    //     return view('pages.auth.login');
    // }

    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->validated();

    //     // Cari user berdasarkan email
    //     $user = User::where('email', $credentials['email'])->first();

    //     // Cek apakah user ditemukan
    //     if (!$user) {
    //         NotificationPusher::error('Email is not registered');
    //         return redirect()->back();
    //     } elseif (!Hash::check($credentials['password'], $user->password)) {
    //         NotificationPusher::error('Password is incorrect');
    //         return redirect()->back();
    //     }

    //     // Buat token untuk user
    //     $token = $user->createToken('auth_token')->plainTextToken;
    //     session()->regenerate();

    //     NotificationPusher::success('Login success', ['token' => $token]);
    //     Auth::login($user); // Log the user in
    //     return redirect()->intended('dashboard');
    // }

    // public function logout()
    // {
    //     auth()->user()->tokens()->delete();

    //     // NotificationPusher::success('Logout success');
    //     return view('pages.landing-page.index');
    // }
    
}

