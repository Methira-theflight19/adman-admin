<?php

namespace App\Models\Award\Traits;

/**
 * Class AwardAttribute.
 */
trait AwardAttribute
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
                '.$this->getEditButtonAttribute("edit-award", "admin.awards.edit").'
                '.$this->getDeleteButtonAttribute("delete-award", "admin.awards.destroy").'
                </div>';
    }
}
