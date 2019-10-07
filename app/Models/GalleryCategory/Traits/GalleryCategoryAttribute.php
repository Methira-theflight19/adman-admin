<?php

namespace App\Models\GalleryCategory\Traits;

/**
 * Class GalleryCategoryAttribute.
 */
trait GalleryCategoryAttribute
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
                '.$this->getEditButtonAttribute("edit-gallerycategory", "admin.gallerycategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-gallerycategory", "admin.gallerycategories.destroy").'
                </div>';
    }
}
