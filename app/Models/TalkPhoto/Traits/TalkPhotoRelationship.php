<?php

namespace App\Models\TalkPhoto\Traits;
use App\Models\TalkDetail\TalkDetail;

/**
 * Class TalkPhotoRelationship
 */
trait TalkPhotoRelationship
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
    public function talkdetail()
    {
        return $this->belongsToMany(TalkDetail::class, 'talk_detail_map_photo', 'photo_id','talk_detail_id');
    }
}
