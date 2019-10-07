<?php
/**
 * GalleryCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'GalleryCategory'], function () {
        Route::resource('gallerycategories', 'GalleryCategoriesController');
        //For Datatable
        Route::post('gallerycategories/get', 'GalleryCategoriesTableController')->name('gallerycategories.get');
    });
    
});