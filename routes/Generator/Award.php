<?php
/**
 * Award
 *
 */
use App\Models\Award\Award;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Award'], function () {
        Route::resource('awards', 'AwardsController');
        //For Datatable
        Route::post('awards/get', 'AwardsTableController')->name('awards.get');
    });
    
});

Route::get('api/award/{id}', function() {
    $awardsub = Award::get();
    return $awardsub;
});
