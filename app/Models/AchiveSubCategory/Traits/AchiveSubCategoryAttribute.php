<?php

namespace App\Models\AchiveSubCategory\Traits;

/**
 * Class AchiveSubCategoryAttribute.
 */
trait AchiveSubCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-achivesubcategory", "admin.achivesubcategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-achivesubcategory", "admin.achivesubcategories.destroy").'
                </div>';
    }
}
