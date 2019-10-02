<?php

namespace App\Http\Responses\Backend\Activity;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Activity\Activity
     */
    protected $activities;
    protected $status;

    /**
     * @param App\Models\Activity\Activity $activities
     */
    public function __construct($activities,$status)
    {
        $this->activities = $activities;
        $this->status = $status;
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
        return view('backend.activities.edit')->with([
            'activities' => $this->activities,
            'status' => $this->status
        ]);
    }
}