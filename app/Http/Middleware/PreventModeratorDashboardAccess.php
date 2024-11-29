<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class PreventModeratorDashboardAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === Role::MODERATOR && $request->is('dashboard')) {
            return redirect('/dashboard/categories');
        }

        return $next($request);
    }
}
