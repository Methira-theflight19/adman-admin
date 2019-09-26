<?php

namespace App\Http\Responses\Backend\sweet;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\sweet\Sweet
     */
    protected $sweets;

    /**
     * @param App\Models\sweet\Sweet $sweets
     */
    public function __construct($sweets)
    {
        $this->sweets = $sweets;
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
        return view('backend.sweets.edit')->with([
            'sweets' => $this->sweets
        ]);
    }
}