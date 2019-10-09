<?php

namespace App\Http\Responses\Backend\Award;

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
    protected $awardsubcat;

    /**
     * @param App\Models\Award\Award $awards
     */
    public function __construct($awardcat,$awardsubcat)
    {
        $this->awardcat = $awardcat;
        $this->awardsubcat = $awardsubcat;
    }
    public function toResponse($request)
    {
        return view('backend.awards.create')->with([
            'awardcat' => $this->awardcat,
            'awardsubcat' => $this->awardsubcat
        ]);
    }
}