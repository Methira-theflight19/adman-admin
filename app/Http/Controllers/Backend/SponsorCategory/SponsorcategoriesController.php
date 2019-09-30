<?php

namespace App\Http\Controllers\Backend\SponsorCategory;

use App\Models\SponsorCategory\Sponsorcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\SponsorCategory\CreateResponse;
use App\Http\Responses\Backend\SponsorCategory\EditResponse;
use App\Repositories\Backend\SponsorCategory\SponsorcategoryRepository;
use App\Http\Requests\Backend\SponsorCategory\ManageSponsorcategoryRequest;
use App\Http\Requests\Backend\SponsorCategory\CreateSponsorcategoryRequest;
use App\Http\Requests\Backend\SponsorCategory\StoreSponsorcategoryRequest;
use App\Http\Requests\Backend\SponsorCategory\EditSponsorcategoryRequest;
use App\Http\Requests\Backend\SponsorCategory\UpdateSponsorcategoryRequest;
use App\Http\Requests\Backend\SponsorCategory\DeleteSponsorcategoryRequest;

/**
 * SponsorcategoriesController
 */
class SponsorcategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SponsorcategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SponsorcategoryRepository $repository;
     */
    public function __construct(SponsorcategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\SponsorCategory\ManageSponsorcategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSponsorcategoryRequest $request)
    {
        return new ViewResponse('backend.sponsorcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSponsorcategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\SponsorCategory\CreateResponse
     */
    public function create(CreateSponsorcategoryRequest $request)
    {
        return new CreateResponse('backend.sponsorcategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSponsorcategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSponsorcategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sponsorcategories.index'), ['flash_success' => trans('alerts.backend.sponsorcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\SponsorCategory\Sponsorcategory  $sponsorcategory
     * @param  EditSponsorcategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\SponsorCategory\EditResponse
     */
    public function edit(Sponsorcategory $sponsorcategory, EditSponsorcategoryRequest $request)
    {
        return new EditResponse($sponsorcategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSponsorcategoryRequestNamespace  $request
     * @param  App\Models\SponsorCategory\Sponsorcategory  $sponsorcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSponsorcategoryRequest $request, Sponsorcategory $sponsorcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sponsorcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sponsorcategories.index'), ['flash_success' => trans('alerts.backend.sponsorcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSponsorcategoryRequestNamespace  $request
     * @param  App\Models\SponsorCategory\Sponsorcategory  $sponsorcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sponsorcategory $sponsorcategory, DeleteSponsorcategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sponsorcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.sponsorcategories.index'), ['flash_success' => trans('alerts.backend.sponsorcategories.deleted')]);
    }
    
}
