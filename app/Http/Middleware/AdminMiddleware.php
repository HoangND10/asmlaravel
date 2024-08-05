<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && Auth::user()->role == 'admin') {
        //     return $next($request);
        // }
        // return redirect()->route('login');
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Kiểm tra vai trò của người dùng và thực hiện chuyển hướng tương ứng
        if (Auth::user()->role === 'user') {
            return $next($request);
        }

        if (Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Chuyển hướng dựa trên vai trò nếu không khớp
        if (Auth::user()->role === 'user') {
            return redirect()->route('login')->with('error', 'Access restricted to admin only.');
        }

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.users.index')->with('error', 'You do not have permission to access this resource.');
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
