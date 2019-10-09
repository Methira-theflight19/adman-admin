<?php

namespace App\Http\Responses\Backend\AchiveSubCategory;

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
    protected $achivecat;
    public function __construct($achivecat)
    {
        $this->achivecat = $achivecat;
    }
    public function toResponse($request)
    {
        return view('backend.achivesubcategories.create')->with([
            'achivecat' => $this->achivecat
        ]);
    }
}