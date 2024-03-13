<?php


Route::get('/', function() {
    dd('gps-route-dev');
});


// 不存在的域名
//Route::fallback(function() {
//    dd('[gps-route-dev] domain not exist!');
//    // return response()->view(env('TEMPLATE_GPS_DEV').'errors.404');
//});




Route::group(['namespace'=>'Dev'], function() {


    // 样式
    Route::group(['prefix'=>'ui'], function() {

        // 不存在的域名
//        Route::fallback(function() {
//            dd('[gps-route-dev-ui] domain not exist!');
//            // return response()->view(env('TEMPLATE_GPS_DEV').'errors.404');
//        });

        $controller = "GPSDevUIController";

        Route::get('/', $controller.'@view_dev_index');
        Route::get('/404', $controller.'@view_dev_404');

    });




});









