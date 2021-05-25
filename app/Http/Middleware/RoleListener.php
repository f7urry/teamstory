<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleListener
{
   public function handle($request, Closure $next)
    {
        $response=$next($request);
        if(Auth::user()->level!=1){
            if(!Gate::check("is_read"))
                abort(401);
        }
        return $response;
    }
}
