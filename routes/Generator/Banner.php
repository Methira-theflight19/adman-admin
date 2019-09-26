<?php

use App\Http\Resources\BannersResource;
use App\Models\Banner\Banner;
/**
 * Banner
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Banner'], function () {
        Route::resource('banners', 'BannersController');
        //For Datatable
        Route::post('banners/get', 'BannersTableController')->name('banners.get');

    });
    
});

    
Route::get('api/banners', function() {
    return new BannersResource(Banner::all());
});
Route::get('api/banners/list', function() {
    return new BannersResource(Banner::where('banner_list', '=', "1")->get());
});
Route::get('api/banners/aboutus', function() {
    return new BannersResource(Banner::where('id', '=', "2")->get());
});
Route::get('api/banners/awards', function() {
    return new BannersResource(Banner::where('id', '=', "3")->get());
});
Route::get('api/banners/activity', function() {
    return new BannersResource(Banner::where('id', '=', "4")->get());
});
Route::get('api/banners/winner', function() {
    return new BannersResource(Banner::where('id', '=', "5")->get());
});
Route::get('api/banners/archive', function() {
    return new BannersResource(Banner::where('id', '=', "6")->get());
});