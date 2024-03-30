<?php

namespace App\Http\Middleware\LY;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth, Response;

class GPSAdminLoginMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $type)
    {
        if(!Auth::guard('gps_admin')->check()) // 未登录
        {
            if($type == "turn")
            {
                return redirect('/login');
            }
            else
            {
                $return["status"] = false;
                $return["log"] = "admin-no-login";
                $return["msg"] = "请先登录";
                return Response::json($return);
            }
        }
        else
        {
            $me = Auth::guard('gps_admin')->user();
            view()->share('me_admin', $me);
        }
        return $next($request);
    }
}
