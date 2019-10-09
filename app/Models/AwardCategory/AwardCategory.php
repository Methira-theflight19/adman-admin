<?php

namespace App\Models\AwardCategory;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\AwardCategory\Traits\AwardCategoryAttribute;
use App\Models\AwardCategory\Traits\AwardCategoryRelationship;

class AwardCategory extends Model
{
    use ModelTrait,
        AwardCategoryAttribute,
    	AwardCategoryRelationship {
            // AwardCategoryAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'award_categories';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'subtitle',
        'active'
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
