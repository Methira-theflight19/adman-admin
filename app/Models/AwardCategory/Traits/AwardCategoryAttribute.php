<?php

namespace App\Models\AwardCategory\Traits;

/**
 * Class AwardCategoryAttribute.
 */
trait AwardCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-awardcategory", "admin.awardcategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-awardcategory", "admin.awardcategories.destroy").'
                </div>';
    }
}
