<?php

namespace App\Models\Judge\Traits;

/**
 * Class JudgeRelationship
 */


use App\Models\JudgeCategory\JudgeCategory;
trait JudgeRelationship
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
        return $this->belongsToMany(JudgeCategory::class, 'judge_map_judgecategory', 'judge_id','judge_cat_id');
    }
}
