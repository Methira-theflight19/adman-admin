<?php

namespace App\Http\Responses\Backend\TalkPhoto;

use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
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
        return view('backend.talkphotos.index')->with([
            'talkdetail' => $this->talkdetail,
        ]);
    }
}