<?php
/**
 * AwardRules
 *
 */
use App\Models\AwardRules\AwardRule;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AwardRules'], function () {
        Route::resource('awardrules', 'AwardRulesController');
        //For Datatable
        Route::post('awardrules/get', 'AwardRulesTableController')->name('awardrules.get');
    });
    
});
Route::get('api/awardrules', function() {
    return AwardRule::get();
});