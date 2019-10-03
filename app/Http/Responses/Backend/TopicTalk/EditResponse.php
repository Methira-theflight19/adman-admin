<?php

namespace App\Http\Responses\Backend\TopicTalk;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\TopicTalk\TopicTalk
     */
    protected $topictalks;

    /**
     * @param App\Models\TopicTalk\TopicTalk $topictalks
     */
    public function __construct($topictalks)
    {
        $this->topictalks = $topictalks;
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
        return view('backend.topictalks.edit')->with([
            'topictalks' => $this->topictalks
        ]);
    }
}