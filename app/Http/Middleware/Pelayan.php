<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pelayan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->roles != 'pelayan'){
            return response()->json(['status' => 'Forbiden'], 401);
        }
        return $next($request);
    }
}
