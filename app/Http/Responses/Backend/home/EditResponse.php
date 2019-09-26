<?php

namespace App\Http\Responses\Backend\home;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\home\Home
     */
    protected $homes;

    /**
     * @param App\Models\home\Home $homes
     */
    public function __construct($homes)
    {
        $this->homes = $homes;
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
        return view('backend.homes.edit')->with([
            'homes' => $this->homes
        ]);
    }
}