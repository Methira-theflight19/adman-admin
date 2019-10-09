<?php

namespace App\Http\Controllers\Backend\AwardSubCategory;

use App\Models\AwardSubCategory\AwardSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AwardSubCategory\CreateResponse;
use App\Http\Responses\Backend\AwardSubCategory\EditResponse;
use App\Repositories\Backend\AwardSubCategory\AwardSubCategoryRepository;
use App\Http\Requests\Backend\AwardSubCategory\ManageAwardSubCategoryRequest;
use App\Http\Requests\Backend\AwardSubCategory\CreateAwardSubCategoryRequest;
use App\Http\Requests\Backend\AwardSubCategory\StoreAwardSubCategoryRequest;
use App\Http\Requests\Backend\AwardSubCategory\EditAwardSubCategoryRequest;
use App\Http\Requests\Backend\AwardSubCategory\UpdateAwardSubCategoryRequest;
use App\Http\Requests\Backend\AwardSubCategory\DeleteAwardSubCategoryRequest;
use App\Models\AwardCategory\AwardCategory;

/**
 * AwardSubCategoriesController
 */
class AwardSubCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardSubCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AwardSubCategoryRepository $repository;
     */
    public function __construct(AwardSubCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AwardSubCategory\ManageAwardSubCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAwardSubCategoryRequest $request)
    {
        return new ViewResponse('backend.awardsubcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAwardSubCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardSubCategory\CreateResponse
     */
    public function create(CreateAwardSubCategoryRequest $request)
    {
        $awardcat = AwardCategory::all();
        return new CreateResponse($awardcat);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAwardSubCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAwardSubCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.awardsubcategories.index'), ['flash_success' => trans('alerts.backend.awardsubcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AwardSubCategory\AwardSubCategory  $awardsubcategory
     * @param  EditAwardSubCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardSubCategory\EditResponse
     */
    public function edit(AwardSubCategory $awardsubcategory, EditAwardSubCategoryRequest $request)
    {
        $awardcat = AwardCategory::all();
        return new EditResponse($awardsubcategory,$awardcat);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwardSubCategoryRequestNamespace  $request
     * @param  App\Models\AwardSubCategory\AwardSubCategory  $awardsubcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAwardSubCategoryRequest $request, AwardSubCategory $awardsubcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $awardsubcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.awardsubcategories.index'), ['flash_success' => trans('alerts.backend.awardsubcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAwardSubCategoryRequestNamespace  $request
     * @param  App\Models\AwardSubCategory\AwardSubCategory  $awardsubcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AwardSubCategory $awardsubcategory, DeleteAwardSubCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($awardsubcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.awardsubcategories.index'), ['flash_success' => trans('alerts.backend.awardsubcategories.deleted')]);
    }
    
}
