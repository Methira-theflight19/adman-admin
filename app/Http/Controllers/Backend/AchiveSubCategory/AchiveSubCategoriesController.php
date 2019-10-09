<?php

namespace App\Http\Controllers\Backend\AchiveSubCategory;

use App\Models\AchiveSubCategory\AchiveSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AchiveSubCategory\CreateResponse;
use App\Http\Responses\Backend\AchiveSubCategory\EditResponse;
use App\Repositories\Backend\AchiveSubCategory\AchiveSubCategoryRepository;
use App\Http\Requests\Backend\AchiveSubCategory\ManageAchiveSubCategoryRequest;
use App\Http\Requests\Backend\AchiveSubCategory\CreateAchiveSubCategoryRequest;
use App\Http\Requests\Backend\AchiveSubCategory\StoreAchiveSubCategoryRequest;
use App\Http\Requests\Backend\AchiveSubCategory\EditAchiveSubCategoryRequest;
use App\Http\Requests\Backend\AchiveSubCategory\UpdateAchiveSubCategoryRequest;
use App\Http\Requests\Backend\AchiveSubCategory\DeleteAchiveSubCategoryRequest;
use App\Models\AchiveCategory\AchiveCategory;
/**
 * AchiveSubCategoriesController
 */
class AchiveSubCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AchiveSubCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AchiveSubCategoryRepository $repository;
     */
    public function __construct(AchiveSubCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AchiveSubCategory\ManageAchiveSubCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAchiveSubCategoryRequest $request)
    {
        
        return new ViewResponse('backend.achivesubcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAchiveSubCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AchiveSubCategory\CreateResponse
     */
    public function create(CreateAchiveSubCategoryRequest $request)
    {
        $achivecat = AchiveCategory::all();
        return new CreateResponse($achivecat);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAchiveSubCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAchiveSubCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.achivesubcategories.index'), ['flash_success' => trans('alerts.backend.achivesubcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AchiveSubCategory\AchiveSubCategory  $achivesubcategory
     * @param  EditAchiveSubCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AchiveSubCategory\EditResponse
     */
    public function edit(AchiveSubCategory $achivesubcategory, EditAchiveSubCategoryRequest $request)
    {
        $achivecat = AchiveCategory::all();
        return new EditResponse($achivesubcategory,$achivecat);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAchiveSubCategoryRequestNamespace  $request
     * @param  App\Models\AchiveSubCategory\AchiveSubCategory  $achivesubcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAchiveSubCategoryRequest $request, AchiveSubCategory $achivesubcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $achivesubcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.achivesubcategories.index'), ['flash_success' => trans('alerts.backend.achivesubcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAchiveSubCategoryRequestNamespace  $request
     * @param  App\Models\AchiveSubCategory\AchiveSubCategory  $achivesubcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AchiveSubCategory $achivesubcategory, DeleteAchiveSubCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($achivesubcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.achivesubcategories.index'), ['flash_success' => trans('alerts.backend.achivesubcategories.deleted')]);
    }
    
}
