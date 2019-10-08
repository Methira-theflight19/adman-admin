<?php

namespace App\Http\Responses\Backend\Gallery;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function __construct($galleryCategories)
    {
        $this->galleryCategories = $galleryCategories;
    }
    public function toResponse($request)
    {
        return view('backend.galleries.create')->with([
            'galleryCategories' => $this->galleryCategories,

        ]);
    }
}