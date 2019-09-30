<?php

namespace App\Http\Responses\Backend\Banner;

use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    /**
     * @var App\Models\Banner\Banner
     */

    protected $menuCategories;

    /**
     * @param App\Models\Banner\Banner $banners
     */
    public function __construct($menuCategories)
    {
        $this->menuCategories = $menuCategories;
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
        return view('backend.banners.index')->with([
            'menuCategories' => $this->menuCategories,

        ]);
    }
}