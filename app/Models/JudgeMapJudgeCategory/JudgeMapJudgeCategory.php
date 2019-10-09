<?php

namespace App\Models\JudgeMapJudgeCategory;

use App\Models\BaseModel;

class JudgeMapJudgeCategory extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'judge_map_judgecategory';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
