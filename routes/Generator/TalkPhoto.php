<?php
/**
 * TalkPhoto
 *
 * 
 */
use App\Models\TalkPhoto\TalkPhoto;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'TalkPhoto'], function () {
        Route::resource('talkphotos', 'TalkPhotosController');
        //For Datatable
        Route::post('talkphotos/get', 'TalkPhotosTableController')->name('talkphotos.get');
    });
    
});
Route::get('api/creativeday/detail/{id}', function($id) {
    $room = TalkPhoto::with('talkdetail')->whereHas('talkdetail', function($q) use ($id) {
        $q->where('talk_detail_id', '=', $id); 
    })->get();
    return $room;
});