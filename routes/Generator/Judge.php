<?php
/**
 * Judge
 *
 */
use App\Models\Judge\Judge;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Judge'], function () {
        Route::resource('judges', 'JudgesController');
        //For Datatable
        Route::post('judges/get', 'JudgesTableController')->name('judges.get');
    });
    
});
Route::get('api/judge/{id}', function($id) {
    $judge = Judge::with('category')->whereHas('category', function($q) use ($id) {
        $q->where('judge_id', '=', $id); 
    })->get();
    return $judge;
});