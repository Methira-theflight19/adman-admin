<?php
/**
 * AboutChairman
 *
 */
use App\Models\AboutChairman\AboutChairman;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AboutChairman'], function () {
        Route::resource('aboutchairman', 'AboutChairManController');
        //For Datatable
        Route::post('aboutchairman/get', 'AboutChairManTableController')->name('aboutchairman.get');
    });
    
});
Route::get('api/about/chairman', function() {
    return AboutChairman::all();
});