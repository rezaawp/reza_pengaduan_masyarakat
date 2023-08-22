<?php

namespace App\Http\Middleware;

use App\Http\Middleware\AuthMiddleware as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Get the path the user should be redirected to when they are not complete to fill data users.
     */
    protected function redirectToWhenNotDone(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('coba');
    }
}
