<?php

namespace App\Http\Responses\Backend\AwardSubCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AwardSubCategory\AwardSubCategory
     */
    protected $awardsubcategories;
    protected $awardcat;

    /**
     * @param App\Models\AwardSubCategory\AwardSubCategory $awardsubcategories
     */
    public function __construct($awardsubcategories,$awardcat)
    {
        $this->awardsubcategories = $awardsubcategories;
        $this->awardcat = $awardcat;
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
        $selectedcat = $this->awardsubcategories->category->pluck('id');
        return view('backend.awardsubcategories.edit')->with([
            'awardsubcategories' => $this->awardsubcategories,
            'awardcat' => $this->awardcat,
            'selectedcat' => $selectedcat
        ]);
    }
}