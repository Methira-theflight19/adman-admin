<?php

namespace App\Models\TalkDetail\Traits;
use App\Models\RoomCategory\RoomCategory;
/**
 * Class TalkDetailRelationship
 */
trait TalkDetailRelationship
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
    public function room()
    {
        return $this->belongsToMany(RoomCategory::class, 'room_map_detail', 'room_id','detail_id');
    }
}
