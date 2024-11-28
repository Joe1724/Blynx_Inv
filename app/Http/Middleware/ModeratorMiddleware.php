<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModeratorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Allow access only if the user is a moderator or admin
        if ($user->role !== Role::MODERATOR && $user->role !== Role::ADMIN) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
