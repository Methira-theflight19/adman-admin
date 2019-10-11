<?php

namespace App\Models\AwardSubCategory\Traits;
use App\Models\AwardCategory\AwardCategory;
use App\Models\Award\Award;
/**
 * Class AwardSubCategoryRelationship
 */
trait AwardSubCategoryRelationship
{
    /*
    * put you model relationships here
    * Take below example for reference
    */
    /*
    public function users() {
        //Note that the below will only work if user is represented as user_id in your table
        //otherwise you have to provide the column name as a parameter
        //see the documentation here : https://laravel.com/docs/5.4/eloquent-relationships
        $this->belongsTo(User::class);
    }
     */
    public function category(){
        return $this->belongsToMany(AwardCategory::class, 'awardcat_map_awardsubcat', 'award_sub_cat_id','award_cat_id');
    }
    public function award(){
        return $this->belongsToMany(Award::class, 'awardsub_map_award', 'award_sub_cat_id','award_id');
    }
  
}
