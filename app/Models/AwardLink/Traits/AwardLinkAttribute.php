<?php

namespace App\Models\AwardLink\Traits;

/**
 * Class AwardLinkAttribute.
 */
trait AwardLinkAttribute
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
                '.$this->getEditButtonAttribute("edit-awardlink", "admin.awardlinks.edit").'
                '.$this->getDeleteButtonAttribute("delete-awardlink", "admin.awardlinks.destroy").'
                </div>';
    }
}
