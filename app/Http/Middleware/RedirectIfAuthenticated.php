<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //ログインしてたら、redirectする
//            return redirect('/home');
            return redirect(route('dashboard'));
        }
            //ログインしていない時
            //$next() コールバックを呼び出して処理を継続
        return $next($request);
    }
}
