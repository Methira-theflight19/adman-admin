<?php

namespace App\Http\Responses\Backend\AboutCommittee;

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
    protected $aboutCommitteeCat;
    public function __construct($aboutCommitteeCat)
    {
        $this->aboutCommitteeCat = $aboutCommitteeCat;
    }
    public function toResponse($request)
    {
        return view('backend.aboutcommittees.create')->with([
            'aboutCommitteeCat' => $this->aboutCommitteeCat,

        ]);
    }
}