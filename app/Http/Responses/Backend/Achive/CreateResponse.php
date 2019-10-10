<?php

namespace App\Http\Responses\Backend\Achive;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected $achivecat;
    protected $achivesubcat;

    /**
     * @param App\Models\Achive\Achive $achives
     */
    public function __construct($achivecat, $achivesubcat)
    {
        $this->achivecat = $achivecat;
        $this->achivesubcat = $achivesubcat;
    }
    public function toResponse($request)
    {
        return view('backend.achives.create')->with([
            'achivecat' => $this->achivecat,
            'achivesubcat' => $this->achivesubcat
        ]);
    }
}