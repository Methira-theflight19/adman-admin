<?php

namespace App\Http\Responses\Backend\AwardCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AwardCategory\AwardCategory
     */
    protected $awardcategories;

    /**
     * @param App\Models\AwardCategory\AwardCategory $awardcategories
     */
    public function __construct($awardcategories)
    {
        $this->awardcategories = $awardcategories;
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
        return view('backend.awardcategories.edit')->with([
            'awardcategories' => $this->awardcategories
        ]);
    }
}