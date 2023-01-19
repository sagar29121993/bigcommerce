<?php

namespace App\Http\Middleware;

use Closure;

class HodMiddleware
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
        
        $roleId = $request->session()->get('role_id');
        if($roleId == 2 or $roleId == 100){
            return $next($request);
        }else{
            abort(403, 'Oops! You do not have HOD access to do this action!!');
        }
    }
}
