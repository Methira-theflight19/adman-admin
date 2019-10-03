<?php

namespace App\Http\Responses\Backend\RoomCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\RoomCategory\RoomCategory
     */
    protected $roomcategories;
    protected $topic;

    /**
     * @param App\Models\RoomCategory\RoomCategory $roomcategories
     */
    public function __construct($roomcategories,$topic)
    {
        $this->roomcategories = $roomcategories;
        $this->topic = $topic;
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
        $selectedtopic = $this->roomcategories->topictalk->pluck('id');

        return view('backend.roomcategories.edit')->with([
            'roomcategories' => $this->roomcategories,
            'topic' => $this->topic,
            'selectedtopic' => $selectedtopic,
        ]);
    }
}