<?php

namespace App\Models\RoomMapDetail;

use App\Models\BaseModel;

class RoomMapDetail extends BaseModel
{
    protected $table = 'room_map_detail';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
