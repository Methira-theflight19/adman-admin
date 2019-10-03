<?php
/**
 * TopicTalk
 *
 */

use App\Models\TopicTalk\TopicTalk;

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'TopicTalk'], function () {
        Route::resource('topictalks', 'TopicTalksController');
        //For Datatable
        Route::post('topictalks/get', 'TopicTalksTableController')->name('topictalks.get');
    });
    
});
Route::get('api/topictalk', function() {
    return TopicTalk::all();
});
