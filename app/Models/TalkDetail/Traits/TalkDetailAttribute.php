<?php

namespace App\Models\TalkDetail\Traits;

/**
 * Class TalkDetailAttribute.
 */
trait TalkDetailAttribute
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
                '.$this->getEditButtonAttribute("edit-talkdetail", "admin.talkdetails.edit").'
                '.$this->getDeleteButtonAttribute("delete-talkdetail", "admin.talkdetails.destroy").'
                </div>';
    }
}
