<?php

namespace App\Http\Responses\Backend\Activity;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status;
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct($status)
    {
        $this->status = $status;
    }
    public function toResponse($request)
    {
        return view('backend.activities.create')->with([
            'status' => $this->status,
        ]);
    }
}