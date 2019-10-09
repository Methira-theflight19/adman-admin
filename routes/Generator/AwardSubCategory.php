<?php
/**
 * AwardSubCategory
 *
 */
use App\Models\AwardSubCategory\AwardSubCategory;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AwardSubCategory'], function () {
        Route::resource('awardsubcategories', 'AwardSubCategoriesController');
        //For Datatable
        Route::post('awardsubcategories/get', 'AwardSubCategoriesTableController')->name('awardsubcategories.get');
    });
    
});
Route::get('api/award_subcategory/{id}', function($id) {
    $awardsub = AwardSubCategory::with('category')->whereHas('category', function($q) use ($id) {
        $q->where('award_cat_id', '=', $id); 
    })->get();
    return $awardsub;
});