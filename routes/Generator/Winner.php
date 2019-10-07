<?php
/**
 * Winner
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Winner'], function () {
        Route::resource('winners', 'WinnersController');
        //For Datatable
        Route::post('winners/get', 'WinnersTableController')->name('winners.get');
    });
    
});