<?php

namespace App\Http\Responses\Backend\AchiveCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AchiveCategory\AchiveCategory
     */
    protected $achivecategories;

    /**
     * @param App\Models\AchiveCategory\AchiveCategory $achivecategories
     */
    public function __construct($achivecategories)
    {
        $this->achivecategories = $achivecategories;
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
        return view('backend.achivecategories.edit')->with([
            'achivecategories' => $this->achivecategories
        ]);
    }
}