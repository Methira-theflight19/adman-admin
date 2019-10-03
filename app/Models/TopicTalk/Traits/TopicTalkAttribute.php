<?php

namespace App\Models\TopicTalk\Traits;

/**
 * Class TopicTalkAttribute.
 */
trait TopicTalkAttribute
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
                '.$this->getEditButtonAttribute("edit-topictalk", "admin.topictalks.edit").'
                '.$this->getDeleteButtonAttribute("delete-topictalk", "admin.topictalks.destroy").'
                </div>';
    }
}
