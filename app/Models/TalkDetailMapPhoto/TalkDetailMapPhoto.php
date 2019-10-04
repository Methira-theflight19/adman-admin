<?php

namespace App\Models\TalkDetailMapPhoto;

use App\Models\BaseModel;

class TalkDetailMapPhoto extends BaseModel
{
    protected $table = 'talk_detail_map_photo';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
