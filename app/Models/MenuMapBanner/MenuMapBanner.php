<?php

namespace App\Models\MenuMapBanner;

use App\Models\BaseModel;

class MenuMapBanner extends BaseModel
{
    protected $table = 'menu_map_banner';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
