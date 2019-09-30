<?php
/**
 * Sponsor
 *
 */
use App\Http\Resources\BannersResource;
use App\Models\Sponsor\Sponsor;
use App\Models\SponsorMapCategory\SponsorMapCategory;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Sponsor'], function () {
        Route::resource('sponsors', 'SponsorsController');
        //For Datatable
        Route::post('sponsors/get', 'SponsorsTableController')->name('sponsors.get');
    });
    
});

Route::get('api/sponsor/{spon_cat}', function($spon_cat) {

    $sponsor = Sponsor::with('category')->whereHas('category', function($q) use ($spon_cat) {
        $q->where('sponsor_cat_id', '=', $spon_cat); 
    })->get();
    // $sponsor = Sponsor::with('category')->wherePivot('sponsor_id', 5)->get();\
    return new BannersResource($sponsor);
});