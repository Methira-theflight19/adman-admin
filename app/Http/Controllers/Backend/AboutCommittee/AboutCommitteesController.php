<?php

namespace App\Http\Controllers\Backend\AboutCommittee;

use App\Models\AboutCommittee\AboutCommittee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AboutCommittee\IndexResponse;
use App\Http\Responses\Backend\AboutCommittee\CreateResponse;
use App\Http\Responses\Backend\AboutCommittee\EditResponse;
use App\Repositories\Backend\AboutCommittee\AboutCommitteeRepository;
use App\Http\Requests\Backend\AboutCommittee\ManageAboutCommitteeRequest;
use App\Http\Requests\Backend\AboutCommittee\CreateAboutCommitteeRequest;
use App\Http\Requests\Backend\AboutCommittee\StoreAboutCommitteeRequest;
use App\Http\Requests\Backend\AboutCommittee\EditAboutCommitteeRequest;
use App\Http\Requests\Backend\AboutCommittee\UpdateAboutCommitteeRequest;
use App\Http\Requests\Backend\AboutCommittee\DeleteAboutCommitteeRequest;
use App\Models\AboutCommitteeCategory\AboutCommitteeCategory;

/**
 * AboutCommitteesController
 */
class AboutCommitteesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutCommitteeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AboutCommitteeRepository $repository;
     */
    public function __construct(AboutCommitteeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AboutCommittee\ManageAboutCommitteeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAboutCommitteeRequest $request)
    {
        $aboutCommitteeCat = AboutCommitteeCategory::all();
        return new IndexResponse($aboutCommitteeCat);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAboutCommitteeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutCommittee\CreateResponse
     */
    public function create(CreateAboutCommitteeRequest $request)
    {
        $aboutCommitteeCat = AboutCommitteeCategory::all();
        return new CreateResponse($aboutCommitteeCat);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAboutCommitteeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAboutCommitteeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.aboutcommittees.index'), ['flash_success' => trans('alerts.backend.aboutcommittees.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AboutCommittee\AboutCommittee  $aboutcommittee
     * @param  EditAboutCommitteeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutCommittee\EditResponse
     */
    public function edit(AboutCommittee $aboutcommittee, EditAboutCommitteeRequest $request)
    {
        $aboutCommitteeCat = AboutCommitteeCategory::all();
        return new EditResponse($aboutcommittee,$aboutCommitteeCat);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAboutCommitteeRequestNamespace  $request
     * @param  App\Models\AboutCommittee\AboutCommittee  $aboutcommittee
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAboutCommitteeRequest $request, AboutCommittee $aboutcommittee)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $aboutcommittee, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.aboutcommittees.index'), ['flash_success' => trans('alerts.backend.aboutcommittees.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAboutCommitteeRequestNamespace  $request
     * @param  App\Models\AboutCommittee\AboutCommittee  $aboutcommittee
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AboutCommittee $aboutcommittee, DeleteAboutCommitteeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($aboutcommittee);
        //returning with successfull message
        return new RedirectResponse(route('admin.aboutcommittees.index'), ['flash_success' => trans('alerts.backend.aboutcommittees.deleted')]);
    }
    
}
