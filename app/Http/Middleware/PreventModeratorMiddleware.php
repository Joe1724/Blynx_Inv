<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;

class PreventModeratorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Check if the user is authenticated and a moderator
        if ($user && $user->role === Role::MODERATOR) {
            return abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
