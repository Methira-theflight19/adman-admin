<?php
/**
 * SponsorCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'SponsorCategory'], function () {
        Route::resource('sponsorcategories', 'SponsorcategoriesController');
        //For Datatable
        Route::post('sponsorcategories/get', 'SponsorcategoriesTableController')->name('sponsorcategories.get');
    });
    
});