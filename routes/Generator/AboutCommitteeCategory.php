<?php
/**
 * AboutCommitteeCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AboutCommitteeCategory'], function () {
        Route::resource('aboutcommitteecategories', 'AboutCommitteeCategoriesController');
        //For Datatable
        Route::post('aboutcommitteecategories/get', 'AboutCommitteeCategoriesTableController')->name('aboutcommitteecategories.get');
    });
    
});