<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuth
{
    public function handle($request, Closure $next)
    {
        if($request->input('api_token') != 'TEST-NOT-LIVE-VWiPnoYDojTeYtKOoO9q882yMkqUCahBdHWF520E'){

            return response()->json(['status' => false, 'data' => 'No man attends his own wedding without the bride. :)'], 401);
        }

        return $next($request);
    }
}
