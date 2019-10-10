<?php

namespace App\Models\AwardMapAwardCategory;

use App\Models\BaseModel;

class AwardMapAwardCategory extends BaseModel
{
    protected $table = 'award_map_awardcat';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
