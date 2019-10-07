<?php

namespace App\Models\Winner\Traits;

/**
 * Class WinnerAttribute.
 */
trait WinnerAttribute
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
                '.$this->getEditButtonAttribute("edit-winner", "admin.winners.edit").'
                '.$this->getDeleteButtonAttribute("delete-winner", "admin.winners.destroy").'
                </div>';
    }
}
