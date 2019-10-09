<?php

namespace App\Http\Responses\Backend\AwardSubCategory;

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
    protected $awardcat;

    /**
     * @param App\Models\AwardSubCategory\AwardSubCategory $awardsubcategories
     */
    public function __construct($awardcat)
    {
        $this->awardcat = $awardcat;
    }

    public function toResponse($request)
    {
        return view('backend.awardsubcategories.create')->with([
            'awardcat' => $this->awardcat
        ]);
    }
}