<?php

namespace App\Http\Responses\Backend\Award;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Award\Award
     */
    protected $awards;
    protected $awardcat;
    protected $awardsubcat;

    /**
     * @param App\Models\Award\Award $awards
     */
    public function __construct($awards,$awardcat,$awardsubcat)
    {
        $this->awards = $awards;
        $this->awardcat = $awardcat;
        $this->awardsubcat = $awardsubcat;
        
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
        $selectedCat = $this->awards->category->pluck('id');
        $selectedsubCat = $this->awards->subcategory->pluck('id');
        return view('backend.awards.edit')->with([
            'awards' => $this->awards,
            'awardcat' => $this->awardcat,
            'awardsubcat' => $this->awardsubcat,
            'selectedCat' => $selectedCat,
            'selectedsubCat' => $selectedsubCat,

        ]);
    }
}