<?php

namespace App\Http\Responses\Backend\AboutCommittee;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AboutCommittee\AboutCommittee
     */
    protected $aboutcommittees;
    protected $aboutCommitteeCat;

    /**
     * @param App\Models\AboutCommittee\AboutCommittee $aboutcommittees
     */
    public function __construct($aboutcommittees,$aboutCommitteeCat)
    {
        $this->aboutcommittees = $aboutcommittees;
        $this->aboutCommitteeCat = $aboutCommitteeCat;
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
        $selectedCat = $this->aboutcommittees->committeecat->pluck('id');
        return view('backend.aboutcommittees.edit')->with([
            'aboutcommittees' => $this->aboutcommittees,
            'aboutCommitteeCat' => $this->aboutCommitteeCat,
            'selectedCat' => $selectedCat
        ]);
    }
}