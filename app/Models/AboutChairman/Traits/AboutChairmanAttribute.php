<?php

namespace App\Models\AboutChairman\Traits;

/**
 * Class AboutChairmanAttribute.
 */
trait AboutChairmanAttribute
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
                '.$this->getEditButtonAttribute("edit-aboutchairman", "admin.aboutchairman.edit").'
                '.$this->getDeleteButtonAttribute("delete-aboutchairman", "admin.aboutchairman.destroy").'
                </div>';
    }
}
