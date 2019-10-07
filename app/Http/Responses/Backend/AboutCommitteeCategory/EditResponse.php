<?php

namespace App\Http\Responses\Backend\AboutCommitteeCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AboutCommitteeCategory\AboutCommitteeCategory
     */
    protected $aboutcommitteecategories;

    /**
     * @param App\Models\AboutCommitteeCategory\AboutCommitteeCategory $aboutcommitteecategories
     */
    public function __construct($aboutcommitteecategories)
    {
        $this->aboutcommitteecategories = $aboutcommitteecategories;
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
        return view('backend.aboutcommitteecategories.edit')->with([
            'aboutcommitteecategories' => $this->aboutcommitteecategories
        ]);
    }
}