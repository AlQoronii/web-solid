<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    // use ResetsPasswords;

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  string|null  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token = null)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => request('email')]);
    }
}