<?php

namespace App\Http\Responses\Backend\JudgeCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\JudgeCategory\JudgeCategory
     */
    protected $judgecategories;

    /**
     * @param App\Models\JudgeCategory\JudgeCategory $judgecategories
     */
    public function __construct($judgecategories)
    {
        $this->judgecategories = $judgecategories;
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
        return view('backend.judgecategories.edit')->with([
            'judgecategories' => $this->judgecategories
        ]);
    }
}