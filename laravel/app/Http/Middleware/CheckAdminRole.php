<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role != 'admin')
            return redirect('logout');
            
        return $next($request);
    }
}
