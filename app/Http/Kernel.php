<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'wx.share' => \App\Http\Middleware\WXShareMiddleware::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'home' => \App\Http\Middleware\HomeMiddleware::class,
        'notification' => \App\Http\Middleware\NotificationMiddleware::class,
        'login' => \App\Http\Middleware\LoginMiddleware::class,
        'login.turn' => \App\Http\Middleware\TurnToLoginMiddleware::class,


        'gps.user.login' => \App\Http\Middleware\LY\GPSUserLoginMiddleware::class,
        'gps.super.login' => \App\Http\Middleware\LY\GPSSuperLoginMiddleware::class,
        'gps.admin.login' => \App\Http\Middleware\LY\GPSAdminLoginMiddleware::class,
        'gps.staff.login' => \App\Http\Middleware\LY\GPSStaffLoginMiddleware::class,


        'gh.web.admin.login' => \App\Http\Middleware\GH\GHWebAdminLoginMiddleware::class,

        'rzk.web.admin.login' => \App\Http\Middleware\RZK\RZKWebAdminLoginMiddleware::class,


        'zy.super.login' => \App\Http\Middleware\ZY\ZYSuperLoginMiddleware::class,
        'zy.admin.login' => \App\Http\Middleware\ZY\ZYAdminLoginMiddleware::class,
        'zy.user.login' => \App\Http\Middleware\ZY\ZYUserLoginMiddleware::class,
        'zy.staff.login' => \App\Http\Middleware\ZY\ZYStaffLoginMiddleware::class,
    ];
}
