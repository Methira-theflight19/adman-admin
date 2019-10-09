<?php

namespace App\Models\AwardSubCategoryMapAward;

use App\Models\BaseModel;

class AwardSubCategoryMapAward extends BaseModel
{
    protected $table = 'awardsub_map_award';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
