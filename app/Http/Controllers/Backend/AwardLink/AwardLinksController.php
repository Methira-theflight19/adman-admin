<?php

namespace App\Http\Controllers\Backend\AwardLink;

use App\Models\AwardLink\AwardLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AwardLink\CreateResponse;
use App\Http\Responses\Backend\AwardLink\EditResponse;
use App\Repositories\Backend\AwardLink\AwardLinkRepository;
use App\Http\Requests\Backend\AwardLink\ManageAwardLinkRequest;
use App\Http\Requests\Backend\AwardLink\EditAwardLinkRequest;
use App\Http\Requests\Backend\AwardLink\UpdateAwardLinkRequest;

/**
 * AwardLinksController
 */
class AwardLinksController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardLinkRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AwardLinkRepository $repository;
     */
    public function __construct(AwardLinkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AwardLink\ManageAwardLinkRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAwardLinkRequest $request)
    {
        return new ViewResponse('backend.awardlinks.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AwardLink\AwardLink  $awardlink
     * @param  EditAwardLinkRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardLink\EditResponse
     */
    public function edit(AwardLink $awardlink, EditAwardLinkRequest $request)
    {
        return new EditResponse($awardlink);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwardLinkRequestNamespace  $request
     * @param  App\Models\AwardLink\AwardLink  $awardlink
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAwardLinkRequest $request, AwardLink $awardlink)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $awardlink, $input );
        //return with successfull message
        return redirect()->back()->with(['flash_success' => trans('alerts.backend.awardlinks.updated')]);
    }
    
}
