<?php
/**
 * AboutCommittee
 *
 */
use App\Models\AboutCommittee\AboutCommittee;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AboutCommittee'], function () {
        Route::resource('aboutcommittees', 'AboutCommitteesController');
        //For Datatable
        Route::post('aboutcommittees/get', 'AboutCommitteesTableController')->name('aboutcommittees.get');
    });
    
});
Route::get('api/about/committee/{id}', function($id) {
    $committee = AboutCommittee::with('committeecat')->whereHas('committeecat', function($q) use ($id) {
        $q->where('commitee_id', '=', $id); 
    })->get();
    return $committee;
});
