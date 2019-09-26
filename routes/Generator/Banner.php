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
        Route::post('banners/get/list', 'BannersTableController@list')->name('banners.getlist');
        Route::get('/list/banners','BannersTableController@listView')->name('banners.list');
    });
    
});

    
Route::get('api/banners', function() {
    return new BannersResource(Banner::all());
});
Route::get('api/banners/list', function() {
    return new BannersResource(Banner::where('banner_list', '=', "1")->get());
});
Route::get('api/banners/all', function() {
    return new BannersResource(Banner::where('banner_list', '=', "0")->get());
});
Route::get('api/banners/{name}', function($name) {
    return new BannersResource(Banner::where('banner_name', '=', $name)->get());
});