<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(auth()->user()->role == 'admin')
            return $next($request);//el middleware le dice que el usuario tiene permitido seguir
        
            return redirect('/');//redirijo a inicio
        
    }
}
