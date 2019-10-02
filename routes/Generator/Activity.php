<?php
use App\Models\Activity\Activity;
/**
 * Activity
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Activity'], function () {
        Route::resource('activities', 'ActivitiesController');
        //For Datatable
        Route::post('activities/get', 'ActivitiesTableController')->name('activities.get');
    });
    
});

Route::get('api/activity/list', function() {
    return  Activity::get();
});
Route::get('api/activity/{id}', function($id) {
    return  Activity::where('id', '=', $id)->get();
});