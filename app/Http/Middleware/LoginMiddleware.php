<?php
namespace App\Http\Middleware;

use Closure;
use Auth;

class LoginMiddleware {

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If the user is not logged in
        if (Auth::guest()) {
            if ($request->ajax()) {
                return response('Unauthorized!', 401);
            } else {
//                return redirect()->guest('users/login');
                $message = "请先登录再进行操作";
                return view ('users/login', compact('message'));
            }
        }

        view()->share('login', true);
        return $next($request);
    }

}