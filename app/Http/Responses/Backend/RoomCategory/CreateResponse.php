<?php

namespace App\Http\Responses\Backend\RoomCategory;

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
    protected $topic;
    public function __construct($topic)
    {
        $this->topic = $topic;
    }
    public function toResponse($request)
    {
        return view('backend.roomcategories.create')->with([
            'topic' => $this->topic,
        ]);
    }
}