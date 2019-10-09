<?php
/**
 * AchiveSubCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AchiveSubCategory'], function () {
        Route::resource('achivesubcategories', 'AchiveSubCategoriesController');
        //For Datatable
        Route::post('achivesubcategories/get', 'AchiveSubCategoriesTableController')->name('achivesubcategories.get');
    });
    
});