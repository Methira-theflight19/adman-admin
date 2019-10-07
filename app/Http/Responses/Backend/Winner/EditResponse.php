<?php

namespace App\Http\Responses\Backend\Winner;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Winner\Winner
     */
    protected $winners;

    /**
     * @param App\Models\Winner\Winner $winners
     */
    public function __construct($winners)
    {
        $this->winners = $winners;
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
        return view('backend.winners.edit')->with([
            'winners' => $this->winners
        ]);
    }
}