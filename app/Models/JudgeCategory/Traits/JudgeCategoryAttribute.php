<?php

namespace App\Models\JudgeCategory\Traits;

/**
 * Class JudgeCategoryAttribute.
 */
trait JudgeCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-judgecategory", "admin.judgecategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-judgecategory", "admin.judgecategories.destroy").'
                </div>';
    }
}
