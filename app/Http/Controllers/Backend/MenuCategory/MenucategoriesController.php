<?php

namespace App\Http\Controllers\Backend\MenuCategory;

use App\Models\MenuCategory\Menucategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\MenuCategory\CreateResponse;
use App\Http\Responses\Backend\MenuCategory\EditResponse;
use App\Repositories\Backend\MenuCategory\MenucategoryRepository;
use App\Http\Requests\Backend\MenuCategory\ManageMenucategoryRequest;
use App\Http\Requests\Backend\MenuCategory\CreateMenucategoryRequest;
use App\Http\Requests\Backend\MenuCategory\StoreMenucategoryRequest;
use App\Http\Requests\Backend\MenuCategory\EditMenucategoryRequest;
use App\Http\Requests\Backend\MenuCategory\UpdateMenucategoryRequest;
use App\Http\Requests\Backend\MenuCategory\DeleteMenucategoryRequest;

/**
 * MenucategoriesController
 */
class MenucategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var MenucategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param MenucategoryRepository $repository;
     */
    public function __construct(MenucategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\MenuCategory\ManageMenucategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageMenucategoryRequest $request)
    {
        return new ViewResponse('backend.menucategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateMenucategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\MenuCategory\CreateResponse
     */
    public function create(CreateMenucategoryRequest $request)
    {
        return new CreateResponse('backend.menucategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMenucategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreMenucategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.menucategories.index'), ['flash_success' => trans('alerts.backend.menucategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\MenuCategory\Menucategory  $menucategory
     * @param  EditMenucategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\MenuCategory\EditResponse
     */
    public function edit(Menucategory $menucategory, EditMenucategoryRequest $request)
    {
        return new EditResponse($menucategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMenucategoryRequestNamespace  $request
     * @param  App\Models\MenuCategory\Menucategory  $menucategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateMenucategoryRequest $request, Menucategory $menucategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $menucategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.menucategories.index'), ['flash_success' => trans('alerts.backend.menucategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteMenucategoryRequestNamespace  $request
     * @param  App\Models\MenuCategory\Menucategory  $menucategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Menucategory $menucategory, DeleteMenucategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($menucategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.menucategories.index'), ['flash_success' => trans('alerts.backend.menucategories.deleted')]);
    }
    
}
