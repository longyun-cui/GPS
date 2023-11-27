<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth, Response;

class ZYStaffLoginMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if(!Auth::guard('zy_staff')->check()) // 未登录
        {
            return redirect('/login');

//            $return["status"] = false;
//            $return["log"] = "admin-no-login";
//            $return["msg"] = "请先登录";
//            return Response::json($return);
        }
        else
        {

            $zy_staff = Auth::guard('zy_staff')->user();
            // 判断用户是否被封禁
            if($zy_staff->user_status != 1)
            {
                Auth::guard('zy_staff')->logout();
                return redirect('/login');
            }
            view()->share('me_staff', $zy_staff);
        }
        return $next($request);
    }
}
