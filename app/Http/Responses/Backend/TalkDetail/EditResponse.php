<?php

namespace App\Http\Responses\Backend\TalkDetail;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\TalkDetail\TalkDetail
     */
    protected $talkdetails;
    protected $rooms;

    /**
     * @param App\Models\TalkDetail\TalkDetail $talkdetails
     */
    public function __construct($talkdetails,$rooms)
    {
        $this->talkdetails = $talkdetails;
        $this->rooms = $rooms;
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
        $selectedroom = $this->talkdetails->room->pluck('id');
        return view('backend.talkdetails.edit')->with([
            'talkdetails' => $this->talkdetails,
            'rooms' => $this->rooms,
            'selectedroom' => $selectedroom,
        ]);
    }
}