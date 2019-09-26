<?php

namespace App\Http\Responses\Backend\test;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\test\Test
     */
    protected $tests;

    /**
     * @param App\Models\test\Test $tests
     */
    public function __construct($tests)
    {
        $this->tests = $tests;
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
        return view('backend.tests.edit')->with([
            'tests' => $this->tests
        ]);
    }
}