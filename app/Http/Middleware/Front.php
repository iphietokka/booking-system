<?php

namespace App\Http\Middleware;

use Closure;

class Front
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
        if (auth()->check() && $request->user()->roles->name == 'Front') {
            return $next($request);
        }
        return redirect()->guest('/');
    }
}
