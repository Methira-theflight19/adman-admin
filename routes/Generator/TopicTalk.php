<?php
/**
 * TopicTalk
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'TopicTalk'], function () {
        Route::resource('topictalks', 'TopicTalksController');
        //For Datatable
        Route::post('topictalks/get', 'TopicTalksTableController')->name('topictalks.get');
    });
    
});