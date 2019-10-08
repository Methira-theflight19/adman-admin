<?php

namespace App\Http\Controllers\Backend\JudgeCategory;

use App\Models\JudgeCategory\JudgeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\JudgeCategory\CreateResponse;
use App\Http\Responses\Backend\JudgeCategory\EditResponse;
use App\Repositories\Backend\JudgeCategory\JudgeCategoryRepository;
use App\Http\Requests\Backend\JudgeCategory\ManageJudgeCategoryRequest;
use App\Http\Requests\Backend\JudgeCategory\CreateJudgeCategoryRequest;
use App\Http\Requests\Backend\JudgeCategory\StoreJudgeCategoryRequest;
use App\Http\Requests\Backend\JudgeCategory\EditJudgeCategoryRequest;
use App\Http\Requests\Backend\JudgeCategory\UpdateJudgeCategoryRequest;
use App\Http\Requests\Backend\JudgeCategory\DeleteJudgeCategoryRequest;

/**
 * JudgeCategoriesController
 */
class JudgeCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var JudgeCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param JudgeCategoryRepository $repository;
     */
    public function __construct(JudgeCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\JudgeCategory\ManageJudgeCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageJudgeCategoryRequest $request)
    {
        return new ViewResponse('backend.judgecategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateJudgeCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\JudgeCategory\CreateResponse
     */
    public function create(CreateJudgeCategoryRequest $request)
    {
        return new CreateResponse('backend.judgecategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreJudgeCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreJudgeCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.judgecategories.index'), ['flash_success' => trans('alerts.backend.judgecategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\JudgeCategory\JudgeCategory  $judgecategory
     * @param  EditJudgeCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\JudgeCategory\EditResponse
     */
    public function edit(JudgeCategory $judgecategory, EditJudgeCategoryRequest $request)
    {
        return new EditResponse($judgecategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateJudgeCategoryRequestNamespace  $request
     * @param  App\Models\JudgeCategory\JudgeCategory  $judgecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateJudgeCategoryRequest $request, JudgeCategory $judgecategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $judgecategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.judgecategories.index'), ['flash_success' => trans('alerts.backend.judgecategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteJudgeCategoryRequestNamespace  $request
     * @param  App\Models\JudgeCategory\JudgeCategory  $judgecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(JudgeCategory $judgecategory, DeleteJudgeCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($judgecategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.judgecategories.index'), ['flash_success' => trans('alerts.backend.judgecategories.deleted')]);
    }
    
}
