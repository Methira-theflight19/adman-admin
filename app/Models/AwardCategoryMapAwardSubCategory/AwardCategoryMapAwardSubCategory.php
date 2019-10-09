<?php

namespace App\Models\AwardCategoryMapAwardSubCategory;

use App\Models\BaseModel;

class AwardCategoryMapAwardSubCategory extends BaseModel
{
    protected $table = 'awardcat_map_awardsubcat';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
