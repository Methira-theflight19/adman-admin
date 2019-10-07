<?php

namespace App\Models\AboutCommitteeMapCategory;

use App\Models\BaseModel;

class AboutCommitteeMapCategory extends BaseModel
{
    protected $table = 'about_committee_map_committeecat';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
