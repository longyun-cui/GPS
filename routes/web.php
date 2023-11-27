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
 * 超级管理员
 */
Route::group(['domain'=>'super.'.env('DOMAIN_ROOT'), 'namespace'=>'Super'], function () {
    require(__DIR__ . '/Super/route.php');
});









/*
 * GPS
 */
Route::group(['domain'=>'gps.'.env('DOMAIN_ROOT'), 'namespace'=>'GPS'], function () {
    require(__DIR__ . '/GPS/route.php');
});
Route::group(['domain'=>'gps.'.env('DOMAIN_ROOT'), 'prefix'=>'admin', 'namespace'=>'GPS'], function () {
    require(__DIR__ . '/GPS/route-admin.php');
});


/*
 * UI
 */
Route::group(['prefix'=>'ui', 'namespace'=>'UI'], function () {
    require(__DIR__ . '/UI/route.php');
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
 * zy 兆益信息
 */
Route::group(['domain'=>'zy.co.'.env('DOMAIN_ROOT'), 'namespace'=>'ZY'], function () {
    require(__DIR__ . '/ZY/route.php');
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







/*
 * 后台
 */
Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {

    // 注册登录
    Route::group(['namespace'=>'Auth'], function () {

        $controller = "AuthController";

        Route::match(['get','post'], 'login', $controller.'@login');
        Route::match(['get','post'], 'logout', $controller.'@logout');

    });


    // 后台管理，需要登录
    Route::group(['middleware'=>'admin'], function () {

        $controller = "AdminController";

        Route::get('/404', $controller.'@view_404');

        Route::get('/', $controller.'@index');

        // 管理员模块
        Route::group(['prefix'=>'administrator'], function () {
            $controller = "AdministratorController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'edit', $controller.'@editAction');

            Route::match(['get','post'], 'password/reset', $controller.'@password_reset');

            Route::match(['get','post'], 'list', $controller.'@viewList');
        });

        // 样式模块
        Route::group(['prefix'=>'module'], function () {
            $controller = "ModuleController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::match(['get','post'], 'sort', $controller.'@sortAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');

            Route::post('delete_multiple_option', $controller.'@deleteMultipleOption');
        });

        // 目录模块
        Route::group(['prefix'=>'menu'], function () {
            $controller = "MenuController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::match(['get','post'], 'items', $controller.'@viewItemsList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::match(['get','post'], 'sort', $controller.'@sortAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');
        });

        // 内容模块
        Route::group(['prefix'=>'item'], function () {
            $controller = "ItemController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');

            Route::get('select2_menus', $controller.'@select2_menus');
        });

        //留言模块
        Route::group(['prefix'=>'message'], function () {
            $controller = "MessageController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');

            Route::get('select2_menus', $controller.'@select2_menus');
        });

    });


});


/*
 * 前台
 */
Route::group(['namespace'=>'Front'], function () {

    $controller = "IndexController";

    Route::get('/root', $controller.'@view_root');

    Route::get('/contact', $controller.'@view_contact');

    Route::get('item/{id?}', $controller.'@view_item');

    Route::get('rent-out/list', $controller.'@view_rent_out_list');
    Route::get('second-wholesale/list', $controller.'@view_second_wholesale_list');

    Route::get('recycle/page', $controller.'@view_recycle_page');

    Route::get('coverage/list', $controller.'@view_coverage_list');

    Route::get('course/list', $controller.'@view_course_list');
    Route::get('course/xiaotang01', $controller.'@view_course_xiaotang01');


    Route::post('message/contact', $controller.'@message_contact');
    Route::post('message/grab/item', $controller.'@message_grab_item');


    Route::group(['prefix'=>'test'], function () {

        $controller = "TestController";

        Route::get('/index', $controller.'@view_index');

    });


});