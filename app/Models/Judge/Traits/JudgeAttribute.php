<?php

namespace App\Models\Judge\Traits;

/**
 * Class JudgeAttribute.
 */
trait JudgeAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-judge", "admin.judges.edit").'
                '.$this->getDeleteButtonAttribute("delete-judge", "admin.judges.destroy").'
                </div>';
    }
}
