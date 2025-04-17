<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response= $next($request);
        $response->header('Cache-Control','nocache,no-store,max-age=0,must-revalidate');
        $response->header('pragma','no-cache');
        $response->header('Expires','sat,01 jan 1990 00:00:00 GMT');
        return $response;
    }
}
