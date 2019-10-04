<?php

namespace App\Http\Responses\Backend\TalkDetail;

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

    protected $rooms;
    public function __construct($rooms)
    {
        $this->rooms = $rooms;
    }

    public function toResponse($request)
    {
        return view('backend.talkdetails.create')->with([
            'rooms' => $this->rooms,
        ]);
    }
}