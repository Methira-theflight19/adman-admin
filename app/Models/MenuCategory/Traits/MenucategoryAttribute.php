<?php

namespace App\Models\MenuCategory\Traits;

/**
 * Class MenucategoryAttribute.
 */
trait MenucategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-menucategory", "admin.menucategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-menucategory", "admin.menucategories.destroy").'
                </div>';
    }
}
