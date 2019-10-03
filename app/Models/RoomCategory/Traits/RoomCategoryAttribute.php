<?php

namespace App\Models\RoomCategory\Traits;

/**
 * Class RoomCategoryAttribute.
 */
trait RoomCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-roomcategory", "admin.roomcategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-roomcategory", "admin.roomcategories.destroy").'
                </div>';
    }
}
