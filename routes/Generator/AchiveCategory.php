<?php
/**
 * AchiveCategory
 *
 */
use App\Models\AchiveCategory\AchiveCategory;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AchiveCategory'], function () {
        Route::resource('achivecategories', 'AchiveCategoriesController');
        //For Datatable
        Route::post('achivecategories/get', 'AchiveCategoriesTableController')->name('achivecategories.get');
    });
    
});
Route::get('api/archive_category', function() {
    return AchiveCategory::get();
});