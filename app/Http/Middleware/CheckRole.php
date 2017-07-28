<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
class CheckRole
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
//     var_dump($request->user());die();
        if($request->user() == null){
            return Redirect::to(url("admin/login"));
        }else{
            return $next($request);
        }
    }
}