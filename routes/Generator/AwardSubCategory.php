<?php
/**
 * AwardSubCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AwardSubCategory'], function () {
        Route::resource('awardsubcategories', 'AwardSubCategoriesController');
        //For Datatable
        Route::post('awardsubcategories/get', 'AwardSubCategoriesTableController')->name('awardsubcategories.get');
    });
    
});