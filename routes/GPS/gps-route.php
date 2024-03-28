<?php

Route::get('/', function () {
    dd('route-admin');
});

Route::group([], function () {


    $controller = "GPSIndexController";

    Route::get('/', $controller.'@index');
    Route::get('/404', $controller.'@view_404');




    // 导航
    Route::group(['prefix'=>'navigation'], function () {

        $controller = "GPSNavigationController";

        Route::get('/', $controller.'@root');

//        Route::match(['get','post'], '/navigation',$controller.'@navigation');
        Route::match(['get','post'], '/test-list',$controller.'@test_list');
        Route::match(['get','post'], '/tool-list',$controller.'@tool_list');
        Route::match(['get','post'], '/template-list',$controller.'@template_list');

        Route::match(['get','post'], '/tool',$controller.'@tool');

    });




});









