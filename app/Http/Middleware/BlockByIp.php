<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockByIp
{

    protected $blocked = ['127.0.0.1'];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request->getClientIp());
        // if(in_array($request->getClientIp(), $this->blocked)) {
        //     abort(403);
        // }
        return $next($request);
    }
}
