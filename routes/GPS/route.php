<?php

Route::get('/', function () {
    dd('route-admin');
});

Route::group(['namespace'=>'Def'], function () {


    $controller = "GPSIndexController";

    Route::get('/', $controller.'@root');




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


    // 工具
    Route::group(['prefix'=>'tool'], function () {

        $controller = "GPSToolController";

        Route::match(['get','post'], '/tool',$controller.'@tool');

    });


    // 开发
    Route::group(['prefix'=>'developing'], function () {

        $controller = "GPSDevelopingController";

        Route::match(['get','post'], '/tool',$controller.'@tool');

    });


    // 测试
    Route::group(['prefix'=>'testing'], function () {

        $controller = "GPSTestingController";

        Route::match(['get','post'], '/', $controller.'@root');


        // 测试
        Route::group(['prefix'=>'php'], function () {

            $controller = "GPSTestingController";

            Route::match(['get','post'], '/', $controller.'@php');

            Route::match(['get','post'], '/headers', $controller.'@test_php_headers');
            Route::match(['get','post'], '/url', $controller.'@test_php_url');
            Route::match(['get','post'], '/json', $controller.'@test_php_json');
            Route::match(['get','post'], '/++', $controller.'@test_php_plus_plus');
            Route::match(['get','post'], '/numbers', $controller.'@test_php_numbers');
            Route::match(['get','post'], '/ip', "{$controller}@get_php_ip_location");
        });

        // 测试
        Route::group(['prefix'=>'js'], function () {

            $controller = "GPSTestingController";

            Route::match(['get','post'], '/', $controller.'@js');
        });




    });



});









