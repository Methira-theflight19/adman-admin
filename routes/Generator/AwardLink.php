<?php
/**
 * Routes for : AwardLink
 */
use App\Models\AwardLink\AwardLink;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'AwardLink'], function () {
	    Route::get('awardlinks', 'AwardLinksController@index')->name('awardlinks.index');
	    
	    Route::get('awardlinks/{awardlink}/edit', 'AwardLinksController@edit')->name('awardlinks.edit');
	    Route::patch('awardlinks/{awardlink}', 'AwardLinksController@update')->name('awardlinks.update');
	    
	    //For Datatable
	    Route::post('awardlinks/get', 'AwardLinksTableController')->name('awardlinks.get');
	});
	
});

Route::get('api/award_link', function($id) {
    return AwardLink::with('menu')->get();
});