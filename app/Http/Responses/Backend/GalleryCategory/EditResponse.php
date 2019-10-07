<?php

namespace App\Http\Responses\Backend\GalleryCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\GalleryCategory\GalleryCategory
     */
    protected $gallerycategories;

    /**
     * @param App\Models\GalleryCategory\GalleryCategory $gallerycategories
     */
    public function __construct($gallerycategories)
    {
        $this->gallerycategories = $gallerycategories;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.gallerycategories.edit')->with([
            'gallerycategories' => $this->gallerycategories
        ]);
    }
}