<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Koki
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
        if($request->user()->roles != 'koki'){
            return response()->json(['status' => 'Forbiden'], 401);
        }
        return $next($request);
    }
}
