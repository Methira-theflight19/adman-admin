<?php

namespace App\Models\AboutCommittee\Traits;

/**
 * Class AboutCommitteeAttribute.
 */
trait AboutCommitteeAttribute
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
                '.$this->getEditButtonAttribute("edit-aboutcommittee", "admin.aboutcommittees.edit").'
                '.$this->getDeleteButtonAttribute("delete-aboutcommittee", "admin.aboutcommittees.destroy").'
                </div>';
    }
}
