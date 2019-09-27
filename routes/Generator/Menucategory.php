<?php
/**
 * MenuCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'MenuCategory'], function () {
        Route::resource('menucategories', 'MenucategoriesController');
        //For Datatable
        Route::post('menucategories/get', 'MenucategoriesTableController')->name('menucategories.get');
    });
    
});