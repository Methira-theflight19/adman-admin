<?php
/**
 * JudgeCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'JudgeCategory'], function () {
        Route::resource('judgecategories', 'JudgeCategoriesController');
        //For Datatable
        Route::post('judgecategories/get', 'JudgeCategoriesTableController')->name('judgecategories.get');
    });
    
});