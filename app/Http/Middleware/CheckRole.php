<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!in_array($user->role->name, $roles)) {
            return response()->json(['error' => 'Only admins can perform this action.'], 403);
        }

        return $next($request);
    }
}
