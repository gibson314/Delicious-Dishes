<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class EliteuserMiddleware
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
        if (Auth::user()->privilege < 2) {
            if ($request->ajax()) {
                return response('Unauthorized!', 401);
            } else {
//                return redirect()->guest('users/login');
//                $message = "你没有此权限访问该页面，请使用管理员账号登录";
                return view ('users/moreinfo');
            }
        }

//        view()->share('login', true);
        return $next($request);
    }
}
