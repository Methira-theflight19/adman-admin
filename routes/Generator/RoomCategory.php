<?php
/**
 * RoomCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'RoomCategory'], function () {
        Route::resource('roomcategories', 'RoomCategoriesController');
        //For Datatable
        Route::post('roomcategories/get', 'RoomCategoriesTableController')->name('roomcategories.get');
    });
    
});