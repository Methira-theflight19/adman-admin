<?php
/**
 * Program
 *
 */
use App\Models\Program\Program;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Program'], function () {
        Route::resource('programs', 'ProgramsController');
        //For Datatable
        Route::post('programs/get', 'ProgramsTableController')->name('programs.get');
    });
    
});
Route::get('api/creativeday/program', function() {
    return  Program::get();
});