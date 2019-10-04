<?php
/**
 * TalkDetail
 *
 */
use App\Models\TalkDetail\TalkDetail;
use App\Http\Resources\TalkDetailResource;

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

Route::get('api/creativeday/time/{id}', function($id) {
    $room = TalkDetail::with('room')->whereHas('room', function($q) use ($id) {
        $q->where('detail_id', '=', $id); 
    })->get();
    return $room;
});