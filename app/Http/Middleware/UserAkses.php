<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles ): Response
    {
       
    $userRoles = Auth::user()->userDesc->roles;

    if (!is_array($userRoles)) {
        $userRoles = [$userRoles];
    }
    
    if (Auth::check() && count(array_intersect($userRoles, $roles)) > 0) {
        return $next($request);
    }


    abort(401, 'Unauthorized');
      
    }
}
