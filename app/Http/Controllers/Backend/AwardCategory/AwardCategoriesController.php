<?php

namespace App\Http\Controllers\Backend\AwardCategory;

use App\Models\AwardCategory\AwardCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AwardCategory\CreateResponse;
use App\Http\Responses\Backend\AwardCategory\EditResponse;
use App\Repositories\Backend\AwardCategory\AwardCategoryRepository;
use App\Http\Requests\Backend\AwardCategory\ManageAwardCategoryRequest;
use App\Http\Requests\Backend\AwardCategory\CreateAwardCategoryRequest;
use App\Http\Requests\Backend\AwardCategory\StoreAwardCategoryRequest;
use App\Http\Requests\Backend\AwardCategory\EditAwardCategoryRequest;
use App\Http\Requests\Backend\AwardCategory\UpdateAwardCategoryRequest;
use App\Http\Requests\Backend\AwardCategory\DeleteAwardCategoryRequest;

/**
 * AwardCategoriesController
 */
class AwardCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AwardCategoryRepository $repository;
     */
    public function __construct(AwardCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AwardCategory\ManageAwardCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAwardCategoryRequest $request)
    {
        return new ViewResponse('backend.awardcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAwardCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardCategory\CreateResponse
     */
    public function create(CreateAwardCategoryRequest $request)
    {
        return new CreateResponse('backend.awardcategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAwardCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAwardCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.awardcategories.index'), ['flash_success' => trans('alerts.backend.awardcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AwardCategory\AwardCategory  $awardcategory
     * @param  EditAwardCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardCategory\EditResponse
     */
    public function edit(AwardCategory $awardcategory, EditAwardCategoryRequest $request)
    {
        return new EditResponse($awardcategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwardCategoryRequestNamespace  $request
     * @param  App\Models\AwardCategory\AwardCategory  $awardcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAwardCategoryRequest $request, AwardCategory $awardcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $awardcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.awardcategories.index'), ['flash_success' => trans('alerts.backend.awardcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAwardCategoryRequestNamespace  $request
     * @param  App\Models\AwardCategory\AwardCategory  $awardcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AwardCategory $awardcategory, DeleteAwardCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($awardcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.awardcategories.index'), ['flash_success' => trans('alerts.backend.awardcategories.deleted')]);
    }
    
}
