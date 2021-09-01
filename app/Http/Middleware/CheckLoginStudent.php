<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class CheckLoginStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->exists('idStudent')) {
            return $next($request);
        } else {
            return Redirect::route("login-student")->with('error', [
                "message" => 'chưa đăng  nhập ',
            ]);
        }
    }
}
