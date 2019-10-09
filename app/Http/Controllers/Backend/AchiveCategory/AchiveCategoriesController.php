<?php

namespace App\Http\Controllers\Backend\AchiveCategory;

use App\Models\AchiveCategory\AchiveCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AchiveCategory\CreateResponse;
use App\Http\Responses\Backend\AchiveCategory\EditResponse;
use App\Repositories\Backend\AchiveCategory\AchiveCategoryRepository;
use App\Http\Requests\Backend\AchiveCategory\ManageAchiveCategoryRequest;
use App\Http\Requests\Backend\AchiveCategory\CreateAchiveCategoryRequest;
use App\Http\Requests\Backend\AchiveCategory\StoreAchiveCategoryRequest;
use App\Http\Requests\Backend\AchiveCategory\EditAchiveCategoryRequest;
use App\Http\Requests\Backend\AchiveCategory\UpdateAchiveCategoryRequest;
use App\Http\Requests\Backend\AchiveCategory\DeleteAchiveCategoryRequest;

/**
 * AchiveCategoriesController
 */
class AchiveCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AchiveCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AchiveCategoryRepository $repository;
     */
    public function __construct(AchiveCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AchiveCategory\ManageAchiveCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAchiveCategoryRequest $request)
    {
        return new ViewResponse('backend.achivecategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAchiveCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AchiveCategory\CreateResponse
     */
    public function create(CreateAchiveCategoryRequest $request)
    {
        return new CreateResponse('backend.achivecategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAchiveCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAchiveCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.achivecategories.index'), ['flash_success' => trans('alerts.backend.achivecategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AchiveCategory\AchiveCategory  $achivecategory
     * @param  EditAchiveCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AchiveCategory\EditResponse
     */
    public function edit(AchiveCategory $achivecategory, EditAchiveCategoryRequest $request)
    {
        return new EditResponse($achivecategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAchiveCategoryRequestNamespace  $request
     * @param  App\Models\AchiveCategory\AchiveCategory  $achivecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAchiveCategoryRequest $request, AchiveCategory $achivecategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $achivecategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.achivecategories.index'), ['flash_success' => trans('alerts.backend.achivecategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAchiveCategoryRequestNamespace  $request
     * @param  App\Models\AchiveCategory\AchiveCategory  $achivecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AchiveCategory $achivecategory, DeleteAchiveCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($achivecategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.achivecategories.index'), ['flash_success' => trans('alerts.backend.achivecategories.deleted')]);
    }
    
}
