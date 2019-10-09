<?php

namespace App\Http\Responses\Backend\Judge;

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
    protected $judgeCategory;

    /**
     * @param App\Models\Judge\Judge $judges
     */
    public function __construct($judgeCategory)
    {
        $this->judgeCategory = $judgeCategory;
    }
    public function toResponse($request)
    {
        return view('backend.judges.create')->with([
            'judgeCategory' => $this->judgeCategory
        ]);
    }
}