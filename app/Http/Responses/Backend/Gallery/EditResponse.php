<?php

namespace App\Http\Responses\Backend\Gallery;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Gallery\Gallery
     */
    protected $galleries;
    protected $galleryCategories;

    /**
     * @param App\Models\Gallery\Gallery $galleries
     */
    public function __construct($galleries,$galleryCategories)
    {
        $this->galleries = $galleries;
        $this->galleryCategories = $galleryCategories;
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
        $selectedgallerycat = $this->galleries->category->pluck('id');
        return view('backend.galleries.edit')->with([
            'galleries' => $this->galleries,
            'galleryCategories' => $this->galleryCategories,
            'selectedgallerycat' => $selectedgallerycat
        ]);
    }
}