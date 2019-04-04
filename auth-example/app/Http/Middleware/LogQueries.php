<?php

namespace App\Http\Middleware;

use Closure;

class LogQueries
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
        dd('Custom middleware have to register in Kernel.php for global or for specific places');
        return $next($request);
    }
}
