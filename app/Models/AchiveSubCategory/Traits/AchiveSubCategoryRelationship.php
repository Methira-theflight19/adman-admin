<?php

namespace App\Models\AchiveSubCategory\Traits;
use App\Models\AchiveCategory\AchiveCategory;
use App\Models\Achive\Achive;

/**
 * Class AchiveSubCategoryRelationship
 */
trait AchiveSubCategoryRelationship
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
        return $this->belongsToMany(AchiveCategory::class, 'achive_category_map_achive_sub_category', 'achive_sub_cat_id','achive_cat_id');
    }
    public function achive(){
        return $this->belongsToMany(Achive::class,  'achive_map_achive_sub_category', 'achive_sub_cat_id','achive_id');
    }
}
