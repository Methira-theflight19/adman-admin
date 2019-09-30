<?php

namespace App\Models\SponsorMapCategory;

use App\Models\BaseModel;

class SponsorMapCategory extends BaseModel
{
    protected $table = 'sponsor_map_category';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
