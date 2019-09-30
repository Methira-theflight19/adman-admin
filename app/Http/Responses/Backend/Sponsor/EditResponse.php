<?php

namespace App\Http\Responses\Backend\Sponsor;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sponsor\Sponsor
     */
    protected $sponsors;
    protected $sponsorCategory;

    /**
     * @param App\Models\Sponsor\Sponsor $sponsors
     */
    public function __construct($sponsors,$sponsorCategory)
    {
        $this->sponsors = $sponsors;
        $this->sponsorCategory = $sponsorCategory;
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
        $selectedsponsorcat = $this->sponsors->category->pluck('id');
        return view('backend.sponsors.edit')->with([
            'sponsors' => $this->sponsors,
            'sponsorCategory' => $this->sponsorCategory,
            'selectedsponsorcat' => $selectedsponsorcat,

        ]);
    }
}