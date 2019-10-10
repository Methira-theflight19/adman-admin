<?php

namespace App\Http\Responses\Backend\AwardLink;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AwardLink\AwardLink
     */
    protected $awardlinks;

    /**
     * @param App\Models\AwardLink\AwardLink $awardlinks
     */
    public function __construct($awardlinks)
    {
        $this->awardlinks = $awardlinks;
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
        return view('backend.awardlinks.edit')->with([
            'awardlinks' => $this->awardlinks
        ]);
    }
}