<?php

namespace App\Http\Middleware\ZY;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth, Response;

class ZYSuperLoginMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if(!Auth::guard('zy_super')->check()) // 未登录
        {
            return redirect('/login');

//            $return["status"] = false;
//            $return["log"] = "admin-no-login";
//            $return["msg"] = "请先登录";
//            return Response::json($return);
        }
        else
        {
            $zy_super = Auth::guard('zy_super')->user();
            view()->share('me_super', $zy_super);
        }
        return $next($request);
    }
}
