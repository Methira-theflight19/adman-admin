<?php

namespace App\Http\Responses\Backend\MenuCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\MenuCategory\Menucategory
     */
    protected $menucategories;

    /**
     * @param App\Models\MenuCategory\Menucategory $menucategories
     */
    public function __construct($menucategories)
    {
        $this->menucategories = $menucategories;
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
        return view('backend.menucategories.edit')->with([
            'menucategories' => $this->menucategories
        ]);
    }
}