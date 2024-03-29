<?php

Route::get('/', function () {
    dd('gps-route-for-gps');
});


//
Route::group([], function () {


    $controller = "LY_GPSIndexController";

    Route::get('/', $controller.'@index');
    Route::get('/404', $controller.'@view_404');


    // 导航
    Route::group(['prefix'=>'navigation'], function () {

        $controller = "LY_GPSNavigationController";

        Route::get('/', $controller.'@root');

//        Route::match(['get','post'], '/navigation',$controller.'@navigation');
        Route::match(['get','post'], '/test-list',$controller.'@test_list');
        Route::match(['get','post'], '/tool-list',$controller.'@tool_list');
        Route::match(['get','post'], '/template-list',$controller.'@template_list');

        Route::match(['get','post'], '/tool',$controller.'@tool');

    });
});




// admin
Route::group(['prefix'=>'admin'], function () {


    Route::get('/', function () {
        dd('gps-route-for-gps-admin');
    });

    $controller = "LY_GPSAdminController";

// 不存在的域名
//Route::fallback(function(){
//    dd('not exist !');
////    return response()->view(env('TEMPLATE_K_SUPER_ADMIN').'errors.404');
//});


    Route::match(['get','post'], 'login', $controller.'@login');
    Route::match(['get','post'], 'logout', $controller.'@logout');


    /*
     * 管理员系统（后台）
     * 需要登录
     */
    Route::group(['middleware' => ['gps.admin.login:turn']], function () {

        $controller = 'LY_GPSAdminController';


        Route::get('/', $controller.'@view_admin_index');
        Route::get('/404', $controller.'@view_admin_404');
        Route::get('/style', $controller.'@view_admin_style');

        Route::match(['get','post'], '/testing-list',$controller.'@view_admin_testing_list');
        Route::match(['get','post'], '/tool-list',$controller.'@view_admin_tool_list');
        Route::match(['get','post'], '/template-list',$controller.'@view_admin_template_list');

        Route::match(['get','post'], '/tool',$controller.'@tool');


        // 测试
        Route::group(['prefix'=>'testing'], function () {

            $controller = "LY_GPSTestingController";

            Route::match(['get','post'], '/', $controller.'@root');


            Route::match(['get','post'], '/php', $controller.'@php');
            Route::match(['get','post'], '/php/headers', $controller.'@test_php_headers');
            Route::match(['get','post'], '/php/url', $controller.'@test_php_url');
            Route::match(['get','post'], '/php/json', $controller.'@test_php_json');
            Route::match(['get','post'], '/php/++', $controller.'@test_php_plus_plus');
            Route::match(['get','post'], '/php/numbers', $controller.'@test_php_numbers');
            Route::match(['get','post'], '/php/ip', "{$controller}@get_php_ip_location");

            Route::match(['get','post'], '/js', $controller.'@js');

        });


        // 工具
        Route::group(['prefix'=>'tool'], function () {

            $controller = "LY_GPSToolController";

            Route::match(['get','post'], '/',$controller.'@tool');
            Route::match(['get','post'], '/password_encode',$controller.'@tool_password_encode');

        });


        // 开发
        Route::group(['prefix'=>'developing'], function () {

            $controller = "GPSDevelopingController";

            Route::match(['get','post'], '/tool',$controller.'@tool');

        });




        /*
         * 个人信息管理
         */
        Route::get('/my-account/my-profile-info-index/', $controller.'@view_my_profile_info_index');
        Route::match(['get','post'], '/my-account/my-profile-info-edit', $controller.'@operate_my_profile_info_edit');
        Route::match(['get','post'], '/my-account/my-password-change', $controller.'@operate_my_account_password_change');




        // 【待办事】

        // 【待办事-目录】创建 & 修改
        Route::match(['get','post'], '/item/todo-menu-create', $controller.'@operate_admin_todo_menu_create');
        Route::match(['get','post'], '/item/todo-menu-edit', $controller.'@operate_admin_todo_menu_edit');
        // 【待办事-目录】列表
        Route::match(['get','post'], '/item/todo-menu-list', $controller.'@view_admin_todo_menu_list');


        // 【待办事-内容】Select2
        Route::match(['get','post'], '/item/todo-select2-menu', $controller.'@operate_admin_todo_select2_menu');
        // 【待办事-内容】创建 & 修改
        Route::match(['get','post'], '/item/todo-item-create', $controller.'@operate_admin_todo_item_create');
        Route::match(['get','post'], '/item/todo-item-edit', $controller.'@operate_admin_todo_item_edit');
        // 【待办事-内容】列表
        Route::match(['get','post'], '/item/todo-item-list', $controller.'@view_admin_todo_item_list');
        // 【待办事-内容】完成
        Route::match(['get','post'], '/item/todo-delete', $controller.'@operate_admin_todo_delete');
        Route::match(['get','post'], '/item/todo-done', $controller.'@operate_admin_todo_done');
        Route::match(['get','post'], '/item/todo-undone', $controller.'@operate_admin_todo_undone');



    });



});









