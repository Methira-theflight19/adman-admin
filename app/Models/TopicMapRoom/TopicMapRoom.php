<?php

namespace App\Models\TopicMapRoom;

use App\Models\BaseModel;

class TopicMapRoom extends BaseModel
{
    protected $table = 'topic_map_room';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
