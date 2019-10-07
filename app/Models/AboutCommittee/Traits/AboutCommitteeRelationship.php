<?php

namespace App\Models\AboutCommittee\Traits;
use App\Models\AboutCommitteeCategory\AboutCommitteeCategory;
/**
 * Class AboutCommitteeRelationship
 */
trait AboutCommitteeRelationship
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
    public function committeecat(){
        return $this->belongsToMany(AboutCommitteeCategory::class, 'about_committee_map_committeecat', 'commitee_id','commitee_cat_id');
    }
    
}
