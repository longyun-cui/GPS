<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
////    return view('welcome');
//});

Route::get('/phpinfo', function () {
    phpinfo();
});




/*
 * Common 通用功能
 */
Route::group(['prefix'=>'common'], function () {

    $controller = "CommonController";

    // 验证码
    Route::match(['get','post'], 'change_captcha', $controller.'@change_captcha');

    //
    Route::get('dataTableI18n', function () {
        return trans('pagination.i18n');
    });
});






/*
 * SUPER
 */
Route::group(['domain'=>'super.'.env('DOMAIN_ROOT'), 'namespace'=>'Super'], function () {
    require(__DIR__ . '/Super/route.php');
});


/*
 * GPS
 */
/*
 * WWW
 */
Route::group(['domain'=>'www.'.env('DOMAIN_ROOT'), 'namespace'=>'LY'], function () {
    require(__DIR__ . '/LY/gps-route-for-www.php');
});
Route::group(['domain'=>'gps.'.env('DOMAIN_ROOT'), 'namespace'=>'LY'], function () {
    require(__DIR__ . '/LY/gps-route-for-gps.php');
});
Route::group(['domain'=>'dev.'.env('DOMAIN_ROOT'), 'namespace'=>'LY'], function () {
    require(__DIR__ . '/LY/gps-route-for-dev.php');
});


/*
 * TESTING 测试
 */
Route::group(['domain'=>'test.'.env('DOMAIN_ROOT'), 'namespace'=>'Testing'], function () {
    require(__DIR__ . '/Testing/route.php');
});
/*
 * Developing 开发中
 */
Route::group(['domain'=>'dev.'.env('DOMAIN_ROOT'), 'namespace'=>'Developing'], function () {
    require(__DIR__ . '/Developing/route.php');

});
/*
 * UI
 */
Route::group(['prefix'=>'ui', 'namespace'=>'UI'], function () {
    require(__DIR__ . '/UI/route.php');
});




/*
 * GH 桂花
 */
Route::group(['domain'=>'gh.'.env('DOMAIN_ROOT'), 'namespace'=>'GH'], function () {
    require(__DIR__ . '/GH/gh-route-web.php');
});
Route::group(['domain'=>env('DOMAIN_GH'), 'namespace'=>'GH'], function () {
    require(__DIR__ . '/GH/gh-route-web.php');
});
Route::group(['domain'=>env('DOMAIN_GH_WWW'), 'namespace'=>'GH'], function () {
    require(__DIR__ . '/GH/gh-route-web.php');
});




/*
 * RZK 瑞足康
 */
Route::group(['domain'=>'rzk.'.env('DOMAIN_ROOT'), 'namespace'=>'RZK'], function () {
    require(__DIR__ . '/RZK/rzk-route-web.php');
});
Route::group(['domain'=>env('DOMAIN_RZK_WEB'), 'namespace'=>'RZK'], function () {
    require(__DIR__ . '/RZK/rzk-route-web.php');
});
Route::group(['domain'=>env('DOMAIN_RZK_WWW'), 'namespace'=>'RZK'], function () {
    require(__DIR__ . '/RZK/rzk-route-web.php');
});




/*
 * zy 兆益信息
 */
Route::group(['domain'=>'zy.'.env('DOMAIN_ROOT'), 'namespace'=>'ZY'], function () {
    require(__DIR__ . '/ZY/route.php');
});
Route::group(['domain'=>'super.zy.'.env('DOMAIN_ROOT'), 'namespace'=>'ZY'], function () {
    require(__DIR__ . '/ZY/route-super.php');
});
Route::group(['domain'=>'admin.zy.'.env('DOMAIN_ROOT'), 'namespace'=>'ZY'], function () {
    require(__DIR__ . '/ZY/route-admin.php');
});
Route::group(['domain'=>'staff.zy.'.env('DOMAIN_ROOT'), 'namespace'=>'ZY'], function () {
    require(__DIR__ . '/ZY/route-staff.php');
});




/*
 * 发邮件
 */
Route::group(['prefix'=>'email'], function () {

    $controller = "TestController";

    //
//    Route::match(['get','post'], '/test',$controller.'@test');
    Route::match(['get','post'], '/send',$controller.'@send');
});








