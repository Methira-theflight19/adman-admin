<?php
/**
 * Award
 *
 */
use App\Models\Award\Award;
use App\Models\AwardCategory\AwardCategory;
use App\Http\Resources\AwardResource;
use App\Models\AwardSubCategory\AwardSubCategory;

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Award'], function () {
        Route::resource('awards', 'AwardsController');
        //For Datatable
        Route::post('awards/get', 'AwardsTableController')->name('awards.get');
    });
    
});


Route::get('api/award/{id}', function($id) {

    $awardwithsub= AwardCategory::with(['subcategory' => function($q) use ($id){
        $q->with(['award']);
    }])->where('id',$id)->get();
    $awardwithcat = AwardCategory::with('award')->where('id',$id)->get();

    if(count($awardwithsub) != 0){
        return $awardwithsub;
    }else{
        return $awardwithcat;
    }
    
    return $award;
});