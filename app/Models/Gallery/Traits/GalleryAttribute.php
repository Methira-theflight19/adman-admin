<?php

namespace App\Models\Gallery\Traits;

/**
 * Class GalleryAttribute.
 */
trait GalleryAttribute
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
                '.$this->getEditButtonAttribute("edit-gallery", "admin.galleries.edit").'
                '.$this->getDeleteButtonAttribute("delete-gallery", "admin.galleries.destroy").'
                </div>';
    }
}
