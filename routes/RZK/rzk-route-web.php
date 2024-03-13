<?php

Route::get('/', function () {
    dd('rzk');
});


/*
 * 主页
 */
Route::group(['namespace' => 'WEB'], function () {

    $controller = 'RZKWebDefController';

    Route::get('/', $controller.'@view_index');
    Route::get('/about', $controller.'@view_about');
    Route::get('/join_us', $controller.'@view_join_us');
    Route::get('/support', $controller.'@view_support');
    Route::get('/product', $controller.'@view_product');
    Route::get('/industry', $controller.'@view_industry');
    Route::get('/news/index', $controller.'@view_news_index');
    Route::get('/news/industry', $controller.'@view_news_industry');
    Route::get('/news-detail', $controller.'@view_news_detail');
    Route::get('/contact', $controller.'@view_contact');
    Route::get('/message-leave', $controller.'@operate_message_leave');

});


/*
 * 管理员后台
 */
Route::group(['prefix' => 'admin', 'namespace' => 'WEB'], function () {

    $controller = "RZKWEBAdminController";

//    // 不存在的域名
//    Route::fallback(function() {
////        dd('not exist !');
//         return response()->view(env('TEMPLATE_RZK_WEB_ADMIN').'entrance.errors.404');
//    });

    Route::match(['get','post'], 'login', $controller.'@login');
    Route::match(['get','post'], 'logout', $controller.'@logout');
    Route::match(['get','post'], 'logout_without_token', $controller.'@logout_without_token');


    /*
     * 需要登录
     */
    Route::group(['middleware' => ['rzk.web.admin.login:turn']], function () {

        $controller = 'RZKWEBAdminController';


        Route::post('/is_only_me', $controller.'@check_is_only_me');
        Route::get('/', $controller.'@view_admin_index');
        Route::get('/404', $controller.'@view_admin_404');


        /*
         * 个人信息管理
         */
        Route::get('/my-account/my-profile-info-index/', $controller.'@view_my_profile_info_index');
        Route::match(['get','post'], '/my-account/my-profile-info-edit', $controller.'@operate_my_profile_info_edit');
        Route::match(['get','post'], '/my-account/my-password-change', $controller.'@operate_my_account_password_change');


        /*
         * 页面管理
         */
        // 创建 & 修改
        Route::match(['get','post'], '/item/page-create', $controller.'@operate_item_page_create');
        Route::match(['get','post'], '/item/page-edit', $controller.'@operate_item_page_edit');
        // 列表
        Route::match(['get','post'], '/item/page-list', $controller.'@view_item_page_list');
        // 删除 & 恢复
        Route::post('/item/page-delete', $controller.'@operate_item_page_delete');
        Route::post('/item/page-restore', $controller.'@operate_item_page_restore');
        Route::post('/item/page-delete-permanently', $controller.'@operate_item_page_delete_permanently');
        // 启用 & 禁用
        Route::post('/item/page-enable', $controller.'@operate_item_page_enable');
        Route::post('/item/page-disable', $controller.'@operate_item_page_disable');
        // 发布 & 完成 & 备注
        Route::post('/item/page-verify', $controller.'@operate_item_page_verify');
        Route::post('/item/page-inspect', $controller.'@operate_item_page_inspect');
        Route::post('/item/page-publish', $controller.'@operate_item_page_publish');
        Route::post('/item/page-complete', $controller.'@operate_item_page_complete');
        Route::post('/item/page-abandon', $controller.'@operate_item_page_abandon');
        Route::post('/item/page-reuse', $controller.'@operate_item_page_reuse');
        Route::post('/item/page-remark-edit', $controller.'@operate_item_page_remark_edit');




        /*
         * 模块管理
         */
        // 创建 & 修改
        Route::match(['get','post'], '/item/module-create', $controller.'@operate_item_module_create');
        Route::match(['get','post'], '/item/module-edit', $controller.'@operate_item_module_edit');
        // 列表
        Route::match(['get','post'], '/item/module-list', $controller.'@view_item_module_list');
        // 删除 & 恢复
        Route::post('/item/module-delete', $controller.'@operate_item_module_delete');
        Route::post('/item/module-restore', $controller.'@operate_item_module_restore');
        Route::post('/item/module-delete-permanently', $controller.'@operate_item_module_delete_permanently');
        // 启用 & 禁用
        Route::post('/item/module-enable', $controller.'@operate_item_module_enable');
        Route::post('/item/module-disable', $controller.'@operate_item_module_disable');
        // 发布 & 完成 & 备注
        Route::post('/item/module-verify', $controller.'@operate_item_module_verify');
        Route::post('/item/module-inspect', $controller.'@operate_item_module_inspect');
        Route::post('/item/module-publish', $controller.'@operate_item_module_publish');
        Route::post('/item/module-complete', $controller.'@operate_item_module_complete');
        Route::post('/item/module-abandon', $controller.'@operate_item_module_abandon');
        Route::post('/item/module-reuse', $controller.'@operate_item_module_reuse');
        Route::post('/item/module-remark-edit', $controller.'@operate_item_module_remark_edit');




        /*
         * 文章管理
         */
        Route::match(['get','post'], '/item/article-create', $controller.'@operate_item_article_create');
        Route::match(['get','post'], '/item/article-edit', $controller.'@operate_item_article_edit');
        // 列表
        Route::match(['get','post'], '/item/article-list', $controller.'@view_item_article_list');
        // 获取
        Route::match(['get','post'], '/item/article-get', $controller.'@operate_item_article_get');
        Route::match(['get','post'], '/item/article-get-html', $controller.'@operate_item_article_get_html');
        Route::match(['get','post'], '/item/v-get-attachment-html', $controller.'@operate_item_article_get_attachment_html');
        // 删除 & 恢复
        Route::post('/item/article-delete', $controller.'@operate_item_article_delete');
        Route::post('/item/article-restore', $controller.'@operate_item_article_restore');
        Route::post('/item/article-delete-permanently', $controller.'@operate_item_article_delete_permanently');
        // 启用 & 禁用
        Route::post('/item/article-enable', $controller.'@operate_item_article_enable');
        Route::post('/item/article-disable', $controller.'@operate_item_article_disable');
        // 发布 & 完成 & 备注
        Route::post('/item/article-verify', $controller.'@operate_item_article_verify');
        Route::post('/item/article-inspect', $controller.'@operate_item_article_inspect');
        Route::post('/item/article-publish', $controller.'@operate_item_article_publish');
        Route::post('/item/article-complete', $controller.'@operate_item_article_complete');
        Route::post('/item/article-abandon', $controller.'@operate_item_article_abandon');
        Route::post('/item/article-reuse', $controller.'@operate_item_article_reuse');
        Route::post('/item/article-remark-edit', $controller.'@operate_item_article_remark_edit');


    });


});