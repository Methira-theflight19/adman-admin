<?php

namespace App\Models\Award\Traits;
use App\Models\AwardSubCategory\AwardSubCategory;
use App\Models\AwardCategory\AwardCategory;
/**
 * Class AwardRelationship
 */
trait AwardRelationship
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
        return $this->belongsToMany(AwardSubCategory::class, 'awardsub_map_award', 'award_id','award_sub_cat_id');
    }
    public function category(){
        return $this->belongsToMany(AwardCategory::class, 'award_map_awardcat', 'award_id','award_cat_id');
    }
}
