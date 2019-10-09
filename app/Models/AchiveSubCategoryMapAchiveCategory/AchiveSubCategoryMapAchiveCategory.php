<?php

namespace App\Models\AchiveSubCategoryMapAchiveCategory;

use App\Models\BaseModel;

class AchiveSubCategoryMapAchiveCategory extends BaseModel
{
    protected $table = 'achive_category_map_achive_sub_category';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
