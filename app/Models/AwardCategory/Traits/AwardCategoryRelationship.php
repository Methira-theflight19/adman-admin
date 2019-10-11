<?php

namespace App\Models\AwardCategory\Traits;
use App\Models\AwardSubCategory\AwardSubCategory;
use App\Models\Award\Award;
/**
 * Class AwardCategoryRelationship
 */
trait AwardCategoryRelationship
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
    public function subcategory(){
        return $this->belongsToMany(AwardSubCategory::class, 'awardcat_map_awardsubcat', 'award_cat_id','award_sub_cat_id');
    }
    public function award(){
        return $this->belongsToMany(Award::class, 'award_map_awardcat', 'award_cat_id','award_id');
    }
}
