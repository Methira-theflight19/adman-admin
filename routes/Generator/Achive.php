<?php
/**
 * Achive
 *
 */
use App\Models\Achive\Achive;
use App\Models\AchiveCategory\AchiveCategory;

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Achive'], function () {
        Route::resource('achives', 'AchivesController');
        //For Datatable
        Route::post('achives/get', 'AchivesTableController')->name('achives.get');
    });
    
});
// Route::get('api/archive/{id}', function() {
//     $awardsub = Award::get();
//     return $awardsub;
// });

Route::get('api/achive/{id}', function($id) {

    $achive= AchiveCategory::with(['subcategory' => function($q) use ($id){
        $q->with(['achive']);
    }])->where('id',$id)->get();

    
    return $achive;
});