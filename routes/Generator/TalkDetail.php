<?php
/**
 * TalkDetail
 *
 */
use App\Models\TalkDetail\TalkDetail;
use App\Http\Resources\TalkDetailResource;
use App\Models\RoomCategory\RoomCategory;

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'TalkDetail'], function () {
        Route::resource('talkdetails', 'TalkDetailsController');
        //For Datatable
        Route::post('talkdetails/get', 'TalkDetailsTableController')->name('talkdetails.get');
    });
    
});


Route::get('api/talkdetail', function() {

    $sponsor = RoomCategory::paginate();
    // $sponsor = Sponsor::with('category')->wherePivot('sponsor_id', 5)->get();\
    return $sponsor;
});

// Route::get('api/talkdetail', function() {

//     $sponsor = RoomCategory::with('topictalk')->get();
//     // $sponsor = Sponsor::with('category')->wherePivot('sponsor_id', 5)->get();\
//     return $sponsor;
// });