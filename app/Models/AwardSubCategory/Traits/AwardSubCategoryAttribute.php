<?php

namespace App\Models\AwardSubCategory\Traits;

/**
 * Class AwardSubCategoryAttribute.
 */
trait AwardSubCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-awardsubcategory", "admin.awardsubcategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-awardsubcategory", "admin.awardsubcategories.destroy").'
                </div>';
    }
}
