<?php

namespace App\Models\AboutCommitteeCategory\Traits;

/**
 * Class AboutCommitteeCategoryAttribute.
 */
trait AboutCommitteeCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-aboutcommitteecategory", "admin.aboutcommitteecategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-aboutcommitteecategory", "admin.aboutcommitteecategories.destroy").'
                </div>';
    }
}
