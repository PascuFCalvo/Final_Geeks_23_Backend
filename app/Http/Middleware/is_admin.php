<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->user_role !== 'admin') {
            return response()->json(
                [
                    "success" => false,
                    "message" => "You are not an admin"
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }
        return $next($request);
    }
}
