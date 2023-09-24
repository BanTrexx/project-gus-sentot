<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {

        if (Auth::guard('web')->user()->hasPermissionTo('edit'))  return $next($request);
        if (Auth::guard('coordinator')->user()->hasPermissionTo('edit'))  return $next($request);

        return $next($request);
    }
}
