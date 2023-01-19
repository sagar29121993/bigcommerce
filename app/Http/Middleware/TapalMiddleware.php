<?php

namespace App\Http\Middleware;

use Closure;

class TapalMiddleware
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
        if($roleId == 1 or $roleId == 111 or $roleId == 100){
            return $next($request);
        }else{
            abort(403, 'Oops! You do not have Tapal User access to do this action!!');
        }
    }
}
