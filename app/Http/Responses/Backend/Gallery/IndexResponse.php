<?php

namespace App\Http\Responses\Backend\Gallery;

use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected $galleryCategories;

    /**
     * @param App\Models\Banner\Banner $banners
     */
    public function __construct($galleryCategories)
    {
        $this->galleryCategories = $galleryCategories;
    }
    public function toResponse($request)
    {
        return view('backend.galleries.index')->with([
            'galleryCategories' => $this->galleryCategories,

        ]);
    }
}