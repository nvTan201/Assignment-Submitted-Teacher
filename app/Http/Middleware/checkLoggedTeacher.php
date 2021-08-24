<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkLoggedTeacher
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
            return redirect()->Route('home');
        } else {
            return $next($request);
        }
    }
}
