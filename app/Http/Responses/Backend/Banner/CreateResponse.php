<?php

namespace App\Http\Responses\Backend\Banner;

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

    protected $menuCategories;
    public function __construct($menuCategories)
    {
        $this->menuCategories = $menuCategories;
    }

    public function toResponse($request)
    {
      

        return view('backend.banners.create')->with([
            'menuCategories' => $this->menuCategories,

        ]);
    }
}