<?php


Route::get('/', function () {
    dd('staff');
});


$controller = "ZYAdminController";

Route::match(['get','post'], 'login', $controller.'@login');
Route::match(['get','post'], 'logout', $controller.'@logout');


/*
 * 超级管理员系统（后台）
 * 需要登录
 */
Route::group(['middleware' => ['zy.admin.login']], function () {

    $controller = 'ZYAdminController';


    Route::get('/', $controller.'@view_admin_index');
    Route::get('/404', $controller.'@view_admin_404');


    /*
     * 个人信息管理
     */
    Route::get('/my-account/my-profile-info-index/', $controller.'@view_my_profile_info_index');
    Route::match(['get','post'], '/my-account/my-profile-info-edit', $controller.'@operate_my_profile_info_edit');
    Route::match(['get','post'], '/my-account/my-password-change', $controller.'@operate_my_account_password_change');




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





    Route::match(['get','post'], '/user/staff-list', $controller.'@view_user_staff_list');
    Route::match(['get','post'], '/user/staff-list-for-all', $controller.'@view_staff_list_for_all');








    /*
     * 内容管理
     */
    Route::match(['get','post'], '/item/item-create', $controller.'@operate_item_item_create');
    Route::match(['get','post'], '/item/item-edit', $controller.'@operate_item_item_edit');
    // 【内容管理】删除 & 恢复 & 永久删除
    Route::post('/item/item-delete', $controller.'@operate_item_item_delete');
    Route::post('/item/item-restore', $controller.'@operate_item_item_restore');
    Route::post('/item/item-delete-permanently', $controller.'@operate_item_item_delete_permanently');
    // 【内容管理】启用 & 禁用
    Route::post('/item/item-enable', $controller.'@operate_item_item_enable');
    Route::post('/item/item-disable', $controller.'@operate_item_item_disable');
    // 【内容管理】发布
    Route::post('/item/item-publish', $controller.'@operate_item_item_publish');
    // 【内容管理】完成 & 备注
    Route::post('/item/item-complete', $controller.'@operate_item_item_complete');
    Route::post('/item/item-remark-edit', $controller.'@operate_item_item_remark_edit');

    // 【内容管理】批量操作
    Route::post('/item/item-operate-bulk', $controller.'@operate_item_item_operate_bulk');
    // 【内容管理】批量操作 - 删除 & 恢复 & 永久删除
    Route::post('/item/item-delete-bulk', $controller.'@operate_item_item_delete_bulk');
    Route::post('/item/item-restore-bulk', $controller.'@operate_item_item_restore_bulk');
    Route::post('/item/item-delete-permanently-bulk', $controller.'@operate_item_item_delete_permanently_bulk');
    // 【内容管理】批量操作 - 启用 & 禁用
    Route::post('/item/item-enable-bulk', $controller.'@operate_item_item_enable_bulk');
    Route::post('/item/item-disable-bulk', $controller.'@operate_item_item_disable_bulk');




    /*
     * 任务管理
     */
    // 【任务管理】删除 & 恢复 & 永久删除
    Route::post('/item/task-admin-delete', $controller.'@operate_item_task_admin_delete');
    Route::post('/item/task-admin-restore', $controller.'@operate_item_task_admin_restore');
    Route::post('/item/task-admin-delete-permanently', $controller.'@operate_item_task_admin_delete_permanently');
    // 【任务管理】启用 & 禁用
    Route::post('/item/task-admin-enable', $controller.'@operate_item_task_admin_enable');
    Route::post('/item/task-admin-disable', $controller.'@operate_item_task_admin_disable');
    // 【任务管理】批量操作
    Route::post('/item/task-admin-operate-bulk', $controller.'@operate_item_task_admin_operate_bulk');
    Route::post('/item/task-admin-delete-bulk', $controller.'@operate_item_task_admin_delete_bulk');
    Route::post('/item/task-admin-restore-bulk', $controller.'@operate_item_task_admin_restore_bulk');
    Route::post('/item/task-admin-delete-permanently-bulk', $controller.'@operate_item_task_admin_delete_permanently_bulk');





    /*
     * 任务管理
     */
    Route::match(['get','post'], '/item/task-list-import', $controller.'@operate_item_task_list_import');

    Route::match(['get','post'], '/item/task-create', $controller.'@operate_item_task_create');
    Route::match(['get','post'], '/item/task-edit', $controller.'@operate_item_task_edit');
    Route::post('/item/task-delete', $controller.'@operate_item_task_delete');
    Route::post('/item/task-restore', $controller.'@operate_item_task_restore');
    Route::post('/item/task-delete-permanently', $controller.'@operate_item_task_delete_permanently');
    Route::post('/item/task-publish', $controller.'@operate_item_task_publish');
    Route::post('/item/task-complete', $controller.'@operate_item_task_complete');
    Route::post('/item/task-remark-edit', $controller.'@operate_item_task_remark_edit');









    Route::match(['get','post'], '/item/item-list', $controller.'@view_item_list');
    Route::match(['get','post'], '/item/item-list-for-all', $controller.'@view_item_list_for_all');

    Route::match(['get','post'], '/item/task-list-for-all', $controller.'@view_task_list_for_all');
    Route::match(['get','post'], '/item/task-list-for-finished', $controller.'@view_task_list_for_finished');






    /*
     * statistic
     */
    Route::match(['get','post'], '/statistic/statistic-index', $controller.'@view_statistic_index');
    Route::match(['get','post'], '/statistic/statistic-user', $controller.'@view_statistic_user');


});

