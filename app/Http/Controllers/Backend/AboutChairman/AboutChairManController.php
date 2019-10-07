<?php

namespace App\Http\Controllers\Backend\AboutChairman;

use App\Models\AboutChairman\AboutChairman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AboutChairman\CreateResponse;
use App\Http\Responses\Backend\AboutChairman\EditResponse;
use App\Repositories\Backend\AboutChairman\AboutChairmanRepository;
use App\Http\Requests\Backend\AboutChairman\ManageAboutChairmanRequest;
use App\Http\Requests\Backend\AboutChairman\CreateAboutChairmanRequest;
use App\Http\Requests\Backend\AboutChairman\StoreAboutChairmanRequest;
use App\Http\Requests\Backend\AboutChairman\EditAboutChairmanRequest;
use App\Http\Requests\Backend\AboutChairman\UpdateAboutChairmanRequest;
use App\Http\Requests\Backend\AboutChairman\DeleteAboutChairmanRequest;

/**
 * AboutChairManController
 */
class AboutChairManController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutChairmanRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AboutChairmanRepository $repository;
     */
    public function __construct(AboutChairmanRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AboutChairman\ManageAboutChairmanRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAboutChairmanRequest $request)
    {
        return new ViewResponse('backend.aboutchairman.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAboutChairmanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutChairman\CreateResponse
     */
    public function create(CreateAboutChairmanRequest $request)
    {
        return new CreateResponse('backend.aboutchairman.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAboutChairmanRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAboutChairmanRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.aboutchairman.index'), ['flash_success' => trans('alerts.backend.aboutchairman.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AboutChairman\AboutChairman  $aboutchairman
     * @param  EditAboutChairmanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutChairman\EditResponse
     */
    public function edit(AboutChairman $aboutchairman, EditAboutChairmanRequest $request)
    {
        return new EditResponse($aboutchairman);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAboutChairmanRequestNamespace  $request
     * @param  App\Models\AboutChairman\AboutChairman  $aboutchairman
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAboutChairmanRequest $request, AboutChairman $aboutchairman)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $aboutchairman, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.aboutchairman.index'), ['flash_success' => trans('alerts.backend.aboutchairman.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAboutChairmanRequestNamespace  $request
     * @param  App\Models\AboutChairman\AboutChairman  $aboutchairman
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AboutChairman $aboutchairman, DeleteAboutChairmanRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($aboutchairman);
        //returning with successfull message
        return new RedirectResponse(route('admin.aboutchairman.index'), ['flash_success' => trans('alerts.backend.aboutchairman.deleted')]);
    }
    
}
