<?php

namespace App\Models\Achive\Traits;

/**
 * Class AchiveAttribute.
 */
trait AchiveAttribute
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
                '.$this->getEditButtonAttribute("edit-achive", "admin.achives.edit").'
                '.$this->getDeleteButtonAttribute("delete-achive", "admin.achives.destroy").'
                </div>';
    }
}
