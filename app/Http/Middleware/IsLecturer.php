<?php

namespace App\Http\Middleware;

use Closure;

class IsLecturer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $role = $user->role;

        if (in_array($role->key, ['admin', 'lecturer'])) {
            return $next($request);
        }

        abort(403, 'You not allowed to visit this page!');
    }
}
