<?php
/**
 * AchiveSubCategory
 *
 */
use App\Models\AchiveSubCategory\AchiveSubCategory;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AchiveSubCategory'], function () {
        Route::resource('achivesubcategories', 'AchiveSubCategoriesController');
        //For Datatable
        Route::post('achivesubcategories/get', 'AchiveSubCategoriesTableController')->name('achivesubcategories.get');
    });
    
});
Route::get('api/archive_subcategory/{id}', function($id) {
    $awardsub = AchiveSubCategory::with('category')->whereHas('category', function($q) use ($id) {
        $q->where('archive_cat_id', '=', $id); 
    })->get();
    return $awardsub;
});