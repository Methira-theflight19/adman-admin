<?php

namespace App\Http\Responses\Backend\Achive;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Achive\Achive
     */
    protected $achives;
    protected $achivecat;
    protected $achivesubcat;

    /**
     * @param App\Models\Achive\Achive $achives
     */
    public function __construct($achives,$achivecat, $achivesubcat)
    {
        $this->achives = $achives;
        $this->achivecat = $achivecat;
        $this->achivesubcat = $achivesubcat;
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
        $selectedCat = $this->achives->category->pluck('id');
        return view('backend.achives.edit')->with([
            'achives' => $this->achives,
            'achivecat' => $this->achivecat,
            'achivesubcat' => $this->achivesubcat,
            'selectedCat' => $selectedCat,
        ]);
    }
}