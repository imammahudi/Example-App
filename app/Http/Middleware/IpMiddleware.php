<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $whiteIps = ['10.54.28.212', '127.0.0.1'];

    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->ip(), $this->whiteIps)) {

            return response()->json(['your ip address is not valid.']);
        }
        return $next($request);
    }   
}
