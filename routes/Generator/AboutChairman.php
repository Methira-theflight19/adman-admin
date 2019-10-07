<?php
/**
 * AboutChairman
 *
 */
use App\Models\AboutChairman\AboutChairman;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AboutChairman'], function () {
        Route::resource('aboutchairman', 'AboutChairmanController');
        //For Datatable
        Route::post('aboutchairman/get', 'AboutChairManTableController')->name('aboutchairman.get');
    });
    
});
Route::get('about/chairman', function() {
    return AboutChairman::all();
});