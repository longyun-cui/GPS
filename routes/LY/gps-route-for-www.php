<?php


/*
 * 超级管理员-后台管理
 */
Route::group(['prefix' => 'admin', 'namespace' => 'WWW'], function () {


    /*
     * 登录
     */
    Route::group([], function () {

        $controller = "LY_WWWAuthController";

        Route::match(['get','post'], 'login', $controller.'@login');
        Route::match(['get','post'], 'logout', $controller.'@logout');

    });


    /*
     * 后台管理，需要登录
     */
    Route::group(['middleware' => 'www.admin.login'], function () {


        $controller = "LY_WWWAdminController";


        Route::get('/', $controller.'@index');
        Route::get('index', $controller.'@index');


        /*
         * user
         */
        Route::match(['get','post'], '/user/user_select2_district', $controller.'@operate_user_select2_district');

        Route::match(['get','post'], '/user/user-create', $controller.'@operate_user_user_create');
        Route::match(['get','post'], '/user/user-edit', $controller.'@operate_user_user_edit');


        /*
         * item
         */
        Route::match(['get','post'], '/item/item-list-for-all', $controller.'@view_item_list_for_all');
        Route::match(['get','post'], '/item/item-list-for-atom', $controller.'@view_item_list_for_atom');
        Route::match(['get','post'], '/item/item-list-for-doc', $controller.'@view_item_list_for_doc');




        Route::match(['get','post'], '/user/user-login', $controller.'@operate_user_user_login');


    });


});




/*
 * 超级管理员
 */
Route::group([], function () {


    $controller = "LY_WWWIndexController";

    Route::get('/', $controller.'@index');



});



/*
 * 后台
 */
Route::group(['prefix'=>'admin1', 'namespace'=>'Admin'], function () {

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

