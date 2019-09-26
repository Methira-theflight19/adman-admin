<?php

namespace App\Http\Responses\Backend\Sponsor;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sponsor\Sponsor
     */
    protected $sponsors;

    /**
     * @param App\Models\Sponsor\Sponsor $sponsors
     */
    public function __construct($sponsors)
    {
        $this->sponsors = $sponsors;
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
        return view('backend.sponsors.edit')->with([
            'sponsors' => $this->sponsors
        ]);
    }
}