<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'errors' => [
                    'message' => ['Unauthorized']
                ]
            ])->setStatusCode(401);
        }

        // Check if the authenticated user has the 'admin' role
        if (Auth::user()->role !== 'admin') {
            return response()->json([
                'errors' => [
                    'message' => ['Forbidden']
                ]
            ])->setStatusCode(403);
        }

        return $next($request);
    }
}
