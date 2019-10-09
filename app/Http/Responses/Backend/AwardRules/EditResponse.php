<?php

namespace App\Http\Responses\Backend\AwardRules;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AwardRules\AwardRule
     */
    protected $awardrules;

    /**
     * @param App\Models\AwardRules\AwardRule $awardrules
     */
    public function __construct($awardrules)
    {
        $this->awardrules = $awardrules;
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
        return view('backend.awardrules.edit')->with([
            'awardrules' => $this->awardrules
        ]);
    }
}