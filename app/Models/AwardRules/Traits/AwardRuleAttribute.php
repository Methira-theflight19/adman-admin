<?php

namespace App\Models\AwardRules\Traits;

/**
 * Class AwardRuleAttribute.
 */
trait AwardRuleAttribute
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
                '.$this->getEditButtonAttribute("edit-awardrule", "admin.awardrules.edit").'
                '.$this->getDeleteButtonAttribute("delete-awardrule", "admin.awardrules.destroy").'
                </div>';
    }
}
