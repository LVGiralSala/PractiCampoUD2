<?php

namespace PractiCampoUD\Http\Middleware;

use Closure;

class Admin
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
        if($request->user()->admin())
        {
            return $next($request);
        }

        else 
        {
            Abort('401');
        }
    }

}
