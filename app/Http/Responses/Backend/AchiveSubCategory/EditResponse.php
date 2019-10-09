<?php

namespace App\Http\Responses\Backend\AchiveSubCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AchiveSubCategory\AchiveSubCategory
     */
    protected $achivesubcategories;
    protected $achivecat;

    /**
     * @param App\Models\AchiveSubCategory\AchiveSubCategory $achivesubcategories
     */
    public function __construct($achivesubcategories,$achivecat)
    {
        $this->achivesubcategories = $achivesubcategories;
        $this->achivecat = $achivecat;
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
        $selectedcat = $this->achivesubcategories->category->pluck('id');
        return view('backend.achivesubcategories.edit')->with([
            'achivesubcategories' => $this->achivesubcategories,
            'achivecat' => $this->achivecat,
            'selectedcat' => $selectedcat

        ]);
    }
}