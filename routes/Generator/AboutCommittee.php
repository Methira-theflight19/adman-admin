<?php
/**
 * AboutCommittee
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AboutCommittee'], function () {
        Route::resource('aboutcommittees', 'AboutCommitteesController');
        //For Datatable
        Route::post('aboutcommittees/get', 'AboutCommitteesTableController')->name('aboutcommittees.get');
    });
    
});