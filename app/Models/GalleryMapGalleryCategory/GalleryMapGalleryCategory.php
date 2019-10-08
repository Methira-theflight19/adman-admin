<?php

namespace App\Models\GalleryMapGalleryCategory;

use App\Models\BaseModel;

class GalleryMapGalleryCategory extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_map_gallerycat';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
