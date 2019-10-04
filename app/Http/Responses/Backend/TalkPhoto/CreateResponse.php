<?php

namespace App\Http\Responses\Backend\TalkPhoto;

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
    protected $talkdetail;
    public function __construct($talkdetail)
    {
        $this->talkdetail = $talkdetail;
    }
    public function toResponse($request)
    {
        return view('backend.talkphotos.create')->with([
            'talkdetail' => $this->talkdetail,
        ]);
    }
}