<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoles
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);

        foreach ($roles as $roleName) {
            if (Auth::check() && Auth::user()->hasRole($roleName)) {
                return $next($request);
            }
        }

        $message = [
            'alert-type' => 'error',
            'message' => 'Maaf, Anda tidak memiliki akses untuk melakukan ini.'
        ];
        
        return redirect()->back()->with($message);
    }

} 