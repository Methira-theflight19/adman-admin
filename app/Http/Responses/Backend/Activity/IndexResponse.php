<?php

namespace App\Http\Responses\Backend\Activity;

use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function toResponse($request)
    {
        return view('backend.activities.index')->with([
            'status'=> $this->status,
        ]);
    }
}
