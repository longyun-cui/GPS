<?php

namespace App\Http\Middleware\GPS;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth, Response;

class GPSUserLoginMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $type)
    {
        if(!Auth::guard('gps_user')->check()) // 未登录
        {
            if($type == "turn")
            {
                return redirect('/login');
            }
            else
            {
                $return["status"] = false;
                $return["log"] = "user-no-login";
                $return["msg"] = "请先登录";
                return Response::json($return);
            }
        }
        else
        {
            $me = Auth::guard('gps_user')->user();
            view()->share('me_user', $me);
        }
        return $next($request);
    }
}
