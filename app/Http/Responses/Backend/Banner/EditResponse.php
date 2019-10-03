<?php

namespace App\Http\Responses\Backend\Banner;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Banner\Banner
     */
    protected $banners;
    protected $menuCategories;

    /**
     * @param App\Models\Banner\Banner $banners
     */
    public function __construct($banners,$menuCategories)
    {
        $this->banners = $banners;
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

        $selectedmenu = $this->banners->menu->pluck('id');

        return view('backend.banners.edit')->with([
            'banners' => $this->banners,
            'menuCategories' => $this->menuCategories,
            'selectedmenu' => $selectedmenu,

        ]);
    }

}