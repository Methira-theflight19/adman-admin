<?php

namespace App\Http\Responses\Backend\Sponsor;

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

    protected $sponsorCategory;
    public function __construct($sponsorCategory)
    {
        $this->sponsorCategory = $sponsorCategory;
    }

    public function toResponse($request)
    {
        return view('backend.sponsors.create')->with([
            'sponsorCategory' => $this->sponsorCategory,
        ]);
    }
}