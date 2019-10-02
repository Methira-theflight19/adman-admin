<?php

namespace App\Http\Controllers\Backend\Activity;

use App\Models\Activity\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\Backend\Activity\IndexResponse;
use App\Http\Responses\Backend\Activity\CreateResponse;
use App\Http\Responses\Backend\Activity\EditResponse;
use App\Repositories\Backend\Activity\ActivityRepository;
use App\Http\Requests\Backend\Activity\ManageActivityRequest;
use App\Http\Requests\Backend\Activity\CreateActivityRequest;
use App\Http\Requests\Backend\Activity\StoreActivityRequest;
use App\Http\Requests\Backend\Activity\EditActivityRequest;
use App\Http\Requests\Backend\Activity\UpdateActivityRequest;
use App\Http\Requests\Backend\Activity\DeleteActivityRequest;

/**
 * ActivitiesController
 */
class ActivitiesController extends Controller
{
    protected $status = [
        'Published' => 'Published',
        'Draft'     => 'Draft',
        'InActive'  => 'InActive',
        'Scheduled' => 'Scheduled',
    ];
    /**
     * variable to store the repository object
     * @var ActivityRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ActivityRepository $repository;
     */
    public function __construct(ActivityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Activity\ManageActivityRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageActivityRequest $request)
    {
        return new IndexResponse($this->status);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateActivityRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Activity\CreateResponse
     */
    public function create(CreateActivityRequest $request)
    {
        return new CreateResponse($this->status);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreActivityRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreActivityRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.activities.index'), ['flash_success' => trans('alerts.backend.activities.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Activity\Activity  $activity
     * @param  EditActivityRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Activity\EditResponse
     */
    public function edit(Activity $activity, EditActivityRequest $request)
    {
        return new EditResponse($activity, $this->status);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateActivityRequestNamespace  $request
     * @param  App\Models\Activity\Activity  $activity
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $activity, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.activities.index'), ['flash_success' => trans('alerts.backend.activities.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteActivityRequestNamespace  $request
     * @param  App\Models\Activity\Activity  $activity
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Activity $activity, DeleteActivityRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($activity);
        //returning with successfull message
        return new RedirectResponse(route('admin.activities.index'), ['flash_success' => trans('alerts.backend.activities.deleted')]);
    }
    
}
