<?php
/**
 * Gallery
 *
 */
use App\Models\Gallery\Gallery;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Gallery'], function () {
        Route::resource('galleries', 'GalleriesController');
        //For Datatable
        Route::post('galleries/get', 'GalleriesTableController')->name('galleries.get');
    });
    
});

Route::get('api/gallery/{id}/{year}', function($id,$year) {
    return Gallery::where('year',$year)->whereHas('category', function($q) use ($id) {
        $q->where('gallery_cat_id', '=', $id); 
    })->get();
});