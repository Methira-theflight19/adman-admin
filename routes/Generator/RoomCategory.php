<?php
/**
 * RoomCategory
 *
 */
use App\Models\RoomCategory\RoomCategory;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'RoomCategory'], function () {
        Route::resource('roomcategories', 'RoomCategoriesController');
        //For Datatable
        Route::post('roomcategories/get', 'RoomCategoriesTableController')->name('roomcategories.get');
    });
    
});

Route::get('api/creativeday/room/{id}', function($id) {
    $time = RoomCategory::with('topictalk')->whereHas('topictalk', function($q) use ($id) {
        $q->where('topic_id', '=', $id); 
    })->get();
    return $time;
});

// $categories = Categorie::all();
// $categories->map(function ($cat){
//     $cat->items=Item::where('category_id',$cat->id)->get();
// });