<?php

namespace App\Models\Sponsor\Traits;

/**
 * Class SponsorAttribute.
 */
trait SponsorAttribute
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
                '.$this->getEditButtonAttribute("edit-sponsor", "admin.sponsors.edit").'
                '.$this->getDeleteButtonAttribute("delete-sponsor", "admin.sponsors.destroy").'
                </div>';
    }
}
