<?php

namespace App\Http\Controllers\Backend\AboutCommitteeCategory;

use App\Models\AboutCommitteeCategory\AboutCommitteeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AboutCommitteeCategory\CreateResponse;
use App\Http\Responses\Backend\AboutCommitteeCategory\EditResponse;
use App\Repositories\Backend\AboutCommitteeCategory\AboutCommitteeCategoryRepository;
use App\Http\Requests\Backend\AboutCommitteeCategory\ManageAboutCommitteeCategoryRequest;
use App\Http\Requests\Backend\AboutCommitteeCategory\CreateAboutCommitteeCategoryRequest;
use App\Http\Requests\Backend\AboutCommitteeCategory\StoreAboutCommitteeCategoryRequest;
use App\Http\Requests\Backend\AboutCommitteeCategory\EditAboutCommitteeCategoryRequest;
use App\Http\Requests\Backend\AboutCommitteeCategory\UpdateAboutCommitteeCategoryRequest;
use App\Http\Requests\Backend\AboutCommitteeCategory\DeleteAboutCommitteeCategoryRequest;

/**
 * AboutCommitteeCategoriesController
 */
class AboutCommitteeCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutCommitteeCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AboutCommitteeCategoryRepository $repository;
     */
    public function __construct(AboutCommitteeCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AboutCommitteeCategory\ManageAboutCommitteeCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAboutCommitteeCategoryRequest $request)
    {
        return new ViewResponse('backend.aboutcommitteecategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAboutCommitteeCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutCommitteeCategory\CreateResponse
     */
    public function create(CreateAboutCommitteeCategoryRequest $request)
    {
        return new CreateResponse('backend.aboutcommitteecategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAboutCommitteeCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAboutCommitteeCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.aboutcommitteecategories.index'), ['flash_success' => trans('alerts.backend.aboutcommitteecategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AboutCommitteeCategory\AboutCommitteeCategory  $aboutcommitteecategory
     * @param  EditAboutCommitteeCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutCommitteeCategory\EditResponse
     */
    public function edit(AboutCommitteeCategory $aboutcommitteecategory, EditAboutCommitteeCategoryRequest $request)
    {
        return new EditResponse($aboutcommitteecategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAboutCommitteeCategoryRequestNamespace  $request
     * @param  App\Models\AboutCommitteeCategory\AboutCommitteeCategory  $aboutcommitteecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAboutCommitteeCategoryRequest $request, AboutCommitteeCategory $aboutcommitteecategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $aboutcommitteecategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.aboutcommitteecategories.index'), ['flash_success' => trans('alerts.backend.aboutcommitteecategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAboutCommitteeCategoryRequestNamespace  $request
     * @param  App\Models\AboutCommitteeCategory\AboutCommitteeCategory  $aboutcommitteecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AboutCommitteeCategory $aboutcommitteecategory, DeleteAboutCommitteeCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($aboutcommitteecategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.aboutcommitteecategories.index'), ['flash_success' => trans('alerts.backend.aboutcommitteecategories.deleted')]);
    }
    
}
