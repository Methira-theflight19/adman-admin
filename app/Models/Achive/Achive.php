<?php

namespace App\Models\Achive;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Achive\Traits\AchiveAttribute;
use App\Models\Achive\Traits\AchiveRelationship;

class Achive extends Model
{
    use ModelTrait,
        AchiveAttribute,
    	AchiveRelationship {
            // AchiveAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'achives';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'brand',
        'advertiser',
        'agency',
        'image',
        'youtube_link',
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
