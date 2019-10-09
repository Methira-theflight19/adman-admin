<?php
/**
 * AwardCategory
 *
 */
use App\Models\AwardCategory\AwardCategory;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AwardCategory'], function () {
        Route::resource('awardcategories', 'AwardCategoriesController');
        //For Datatable
        Route::post('awardcategories/get', 'AwardCategoriesTableController')->name('awardcategories.get');
    });
    
});
Route::get('api/award_category', function() {
    return AwardCategory::get();
});