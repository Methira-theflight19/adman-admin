<?php

namespace App\Http\Responses\Backend\Judge;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Judge\Judge
     */
    protected $judges;
    protected $judgeCategory;

    /**
     * @param App\Models\Judge\Judge $judges
     */
    public function __construct($judges,$judgeCategory)
    {
        $this->judges = $judges;
        $this->judgeCategory = $judgeCategory;
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
        $selectedCat = $this->judges->category->pluck('id');
        return view('backend.judges.edit')->with([
            'judges' => $this->judges,
            'judgeCategory' => $this->judgeCategory,
            'selectedCat' => $selectedCat
        ]);
    }
}