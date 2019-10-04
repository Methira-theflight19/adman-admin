<?php

namespace App\Http\Responses\Backend\TalkPhoto;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\TalkPhoto\TalkPhoto
     */
    protected $talkphotos;
    protected $talkdetail;

    /**
     * @param App\Models\TalkPhoto\TalkPhoto $talkphotos
     */
    public function __construct($talkphotos,$talkdetail)
    {
        $this->talkphotos = $talkphotos;
        $this->talkdetail = $talkdetail;
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
        $selectedtalkdetail = $this->talkphotos->talkdetail->pluck('id');
        return view('backend.talkphotos.edit')->with([
            'talkphotos' => $this->talkphotos,
            'talkdetail' => $this->talkdetail,
            'selectedtalkdetail' => $selectedtalkdetail,
        ]);
    }
}