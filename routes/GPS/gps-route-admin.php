<?php


Route::get('/', function () {
    dd('route-gps-admin');
});


$controller = "GPSAdminController";

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

    $controller = 'GPSAdminController';


    Route::get('/', $controller.'@view_admin_index');
    Route::get('/404', $controller.'@view_admin_404');
    Route::get('/style', $controller.'@view_admin_style');

    Route::match(['get','post'], '/testing-list',$controller.'@view_admin_testing_list');
    Route::match(['get','post'], '/tool-list',$controller.'@view_admin_tool_list');
    Route::match(['get','post'], '/template-list',$controller.'@view_admin_template_list');

    Route::match(['get','post'], '/tool',$controller.'@tool');


    // 测试
    Route::group(['prefix'=>'testing'], function () {

        $controller = "GPSTestingController";

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

        $controller = "GPSToolController";

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





    /*
     * 用户-员工管理
     */
    Route::match(['get','post'], '/user/user_select2_district', $controller.'@operate_user_select2_district');
    Route::match(['get','post'], '/user/user_select2_sales', $controller.'@operate_user_select2_sales');

    // 【用户-员工管理】创建 & 修改
    Route::match(['get','post'], '/user/staff-create', $controller.'@operate_user_staff_create');
    Route::match(['get','post'], '/user/staff-edit', $controller.'@operate_user_staff_edit');
    // 【用户-员工管理】修改密码
    Route::match(['get','post'], '/user/staff-password-admin-change', $controller.'@operate_user_staff_password_admin_change');
    Route::match(['get','post'], '/user/staff-password-admin-reset', $controller.'@operate_user_staff_password_admin_reset');
    Route::match(['get','post'], '/user/user-login', $controller.'@operate_user_user_login');
    // 【用户-员工管理】删除 & 恢复 & 永久删除
    Route::post('/user/staff-admin-delete', $controller.'@operate_user_staff_admin_delete');
    Route::post('/user/staff-admin-restore', $controller.'@operate_user_staff_admin_restore');
    Route::post('/user/staff-admin-delete-permanently', $controller.'@operate_user_staff_admin_delete_permanently');
    // 【用户-员工管理】启用 & 禁用
    Route::post('/user/staff-admin-enable', $controller.'@operate_user_staff_admin_enable');
    Route::post('/user/staff-admin-disable', $controller.'@operate_user_staff_admin_disable');

    // 列表
    Route::match(['get','post'], '/user/staff-list', $controller.'@view_user_staff_list');
    Route::match(['get','post'], '/user/staff-list-for-all', $controller.'@view_staff_list_for_all');














    /*
     * 订单管理
     */
    // select2
    Route::match(['get','post'], '/item/order_select2_client', $controller.'@operate_order_select2_client');
    Route::match(['get','post'], '/item/order_select2_car', $controller.'@operate_order_select2_car');
    Route::match(['get','post'], '/item/order_select2_circle', $controller.'@operate_order_select2_circle');
    Route::match(['get','post'], '/item/order_select2_route', $controller.'@operate_order_select2_route');
    Route::match(['get','post'], '/item/order_select2_pricing', $controller.'@operate_order_select2_pricing');
    Route::match(['get','post'], '/item/order_select2_trailer', $controller.'@operate_order_select2_trailer');
    Route::match(['get','post'], '/item/order_list_select2_car', $controller.'@operate_order_list_select2_car');
    Route::match(['get','post'], '/item/order_select2_driver', $controller.'@operate_order_select2_driver');

    // 创建 & 修改
    Route::match(['get','post'], '/item/order-create', $controller.'@operate_item_order_create');
    Route::match(['get','post'], '/item/order-edit', $controller.'@operate_item_order_edit');
    // 导入
    Route::match(['get','post'], '/item/order-import', $controller.'@operate_item_order_import');

    // 获取
    Route::match(['get','post'], '/item/order-get', $controller.'@operate_item_order_get');
    Route::match(['get','post'], '/item/order-get-html', $controller.'@operate_item_order_get_html');
    Route::match(['get','post'], '/item/order-get-attachment-html', $controller.'@operate_item_order_get_attachment_html');
    // 删除 & 恢复
    Route::post('/item/order-delete', $controller.'@operate_item_order_delete');
    Route::post('/item/order-restore', $controller.'@operate_item_order_restore');
    Route::post('/item/order-delete-permanently', $controller.'@operate_item_order_delete_permanently');
    // 启用 & 禁用
    Route::post('/item/order-enable', $controller.'@operate_item_order_enable');
    Route::post('/item/order-disable', $controller.'@operate_item_order_disable');
    // 发布 & 完成 & 备注
    Route::post('/item/order-verify', $controller.'@operate_item_order_verify');
    Route::post('/item/order-publish', $controller.'@operate_item_order_publish');
    Route::post('/item/order-complete', $controller.'@operate_item_order_complete');
    Route::post('/item/order-abandon', $controller.'@operate_item_order_abandon');
    Route::post('/item/order-reuse', $controller.'@operate_item_order_reuse');
    Route::post('/item/order-remark-edit', $controller.'@operate_item_order_remark_edit');

    // 列表
    Route::match(['get','post'], '/item/order-list', $controller.'@view_item_order_list');
    Route::match(['get','post'], '/item/order-list-for-all', $controller.'@view_item_order_list_for_all');

    // 订单-基本信息
    Route::post('/item/order-info-text-set', $controller.'@operate_item_order_info_text_set');
    Route::post('/item/order-info-time-set', $controller.'@operate_item_order_info_time_set');
    Route::post('/item/order-info-radio-set', $controller.'@operate_item_order_info_option_set');
    Route::post('/item/order-info-select-set', $controller.'@operate_item_order_info_option_set');
    Route::post('/item/order-info-select2-set', $controller.'@operate_item_order_info_option_set');
    Route::post('/item/order-info-client-set', $controller.'@operate_item_order_info_client_set');
    Route::post('/item/order-info-car-set', $controller.'@operate_item_order_info_car_set');
    // 订单-附件
    Route::post('/item/order-info-attachment-set', $controller.'@operate_item_order_info_attachment_set');
    Route::post('/item/order-info-attachment-delete', $controller.'@operate_item_order_info_attachment_delete');


    // 订单-行程信息
    Route::post('/item/order-travel-set', $controller.'@operate_item_order_travel_set');
    // 订单-财务信息
    Route::match(['get','post'], '/item/order-finance-record', $controller.'@view_item_order_finance_record');
    Route::post('/item/order-finance-record-create', $controller.'@operate_item_order_finance_record_create');
    Route::post('/item/order-finance-record-edit', $controller.'@operate_item_order_finance_record_edit');
    // 订单-修改信息
    Route::match(['get','post'], '/item/order-modify-record', $controller.'@view_item_order_modify_record');







});

