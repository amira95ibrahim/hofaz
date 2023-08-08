<?php
namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect()->route('login'); // Redirect to the login page if not authenticated as an admin.
    }
}
