<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        if (!isset($user->role) || $user->role['name'] !== $role) {
            return response()->json(['message' => 'Unauthorized', 'user_role' => $user->role, 'required_role' => $role], 403);
        }

        return $next($request);
    }
}