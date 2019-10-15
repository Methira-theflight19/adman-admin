<?php

namespace App\Models\AchiveCategory\Traits;
use App\Models\AchiveSubCategory\AchiveSubCategory;
/**
 * Class AchiveCategoryRelationship
 */
trait AchiveCategoryRelationship
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
        return $this->belongsToMany(AchiveSubCategory::class, 'achive_category_map_achive_sub_category', 'achive_cat_id','achive_sub_cat_id');
    }
}
