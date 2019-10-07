<?php

namespace App\Http\Responses\Backend\AboutChairman;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AboutChairman\AboutChairman
     */
    protected $aboutchairman;

    /**
     * @param App\Models\AboutChairman\AboutChairman $aboutchairman
     */
    public function __construct($aboutchairman)
    {
        $this->aboutchairman = $aboutchairman;
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
        return view('backend.aboutchairman.edit')->with([
            'aboutchairman' => $this->aboutchairman
        ]);
    }
}