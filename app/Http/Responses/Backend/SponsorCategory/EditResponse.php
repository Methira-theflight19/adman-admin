<?php

namespace App\Http\Responses\Backend\SponsorCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\SponsorCategory\Sponsorcategory
     */
    protected $sponsorcategories;

    /**
     * @param App\Models\SponsorCategory\Sponsorcategory $sponsorcategories
     */
    public function __construct($sponsorcategories)
    {
        $this->sponsorcategories = $sponsorcategories;
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
        return view('backend.sponsorcategories.edit')->with([
            'sponsorcategories' => $this->sponsorcategories
        ]);
    }
}