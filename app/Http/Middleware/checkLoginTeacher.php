<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkLoginTeacher
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
        if ($request->session()->exists('id')) {
            return $next($request);
        } else {
            return redirect()->Route('login-teacher')->with('error', ['message' => 'Chưa Đăng Nhập!']);
        }
    }
}
