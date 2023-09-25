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
        if (Auth::guard('web')->check()) {
            $auth = Auth::guard('web');
        } else {
            $auth = Auth::guard('coordinator');
        }

        if ($auth->user()->hasPermissionTo('edit'))  return $next($request);
        if ($auth->user()->hasPermissionTo('edit'))  return $next($request);

        abort(403);
    }
}
