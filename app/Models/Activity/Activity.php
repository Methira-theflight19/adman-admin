<?php

namespace App\Models\Activity;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity\Traits\ActivityAttribute;
use App\Models\Activity\Traits\ActivityRelationship;

class Activity extends Model
{
    use ModelTrait,
        ActivityAttribute,
    	ActivityRelationship {
            // ActivityAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'activities';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'subtitle',
        'publish_datetime',
        'image',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sort',
        'status',
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
        'publish_datetime',
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
