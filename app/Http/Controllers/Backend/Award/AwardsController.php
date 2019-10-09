<?php

namespace App\Http\Controllers\Backend\Award;

use App\Models\Award\Award;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Award\CreateResponse;
use App\Http\Responses\Backend\Award\EditResponse;
use App\Repositories\Backend\Award\AwardRepository;
use App\Http\Requests\Backend\Award\ManageAwardRequest;
use App\Http\Requests\Backend\Award\CreateAwardRequest;
use App\Http\Requests\Backend\Award\StoreAwardRequest;
use App\Http\Requests\Backend\Award\EditAwardRequest;
use App\Http\Requests\Backend\Award\UpdateAwardRequest;
use App\Http\Requests\Backend\Award\DeleteAwardRequest;
use App\Models\AwardCategory\AwardCategory;
use App\Models\AwardSubCategory\AwardSubCategory;
/**
 * AwardsController
 */
class AwardsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AwardRepository $repository;
     */
    public function __construct(AwardRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Award\ManageAwardRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAwardRequest $request)
    {
        return new ViewResponse('backend.awards.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAwardRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Award\CreateResponse
     */
    public function create(CreateAwardRequest $request)
    {
        $awardcat = AwardCategory::get();
        $awardsubcat = AwardSubCategory::with('category')->get();
        return new CreateResponse($awardcat,$awardsubcat);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAwardRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAwardRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.awards.index'), ['flash_success' => trans('alerts.backend.awards.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Award\Award  $award
     * @param  EditAwardRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Award\EditResponse
     */
    public function edit(Award $award, EditAwardRequest $request)
    {
        $awardcat = AwardCategory::get();
        $awardsubcat = AwardSubCategory::with('category')->get();
        return new EditResponse($award, $awardcat,$awardsubcat);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwardRequestNamespace  $request
     * @param  App\Models\Award\Award  $award
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAwardRequest $request, Award $award)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $award, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.awards.index'), ['flash_success' => trans('alerts.backend.awards.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAwardRequestNamespace  $request
     * @param  App\Models\Award\Award  $award
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Award $award, DeleteAwardRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($award);
        //returning with successfull message
        return new RedirectResponse(route('admin.awards.index'), ['flash_success' => trans('alerts.backend.awards.deleted')]);
    }
    
}
