<?php

namespace App\Http\Controllers\Backend\Sponsor;

use App\Models\Sponsor\Sponsor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Sponsor\CreateResponse;
use App\Http\Responses\Backend\Sponsor\EditResponse;
use App\Repositories\Backend\Sponsor\SponsorRepository;
use App\Http\Requests\Backend\Sponsor\ManageSponsorRequest;
use App\Http\Requests\Backend\Sponsor\CreateSponsorRequest;
use App\Http\Requests\Backend\Sponsor\StoreSponsorRequest;
use App\Http\Requests\Backend\Sponsor\EditSponsorRequest;
use App\Http\Requests\Backend\Sponsor\UpdateSponsorRequest;
use App\Http\Requests\Backend\Sponsor\DeleteSponsorRequest;
use App\Models\SponsorCategory\Sponsorcategory;

/**
 * SponsorsController
 */
class SponsorsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SponsorRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SponsorRepository $repository;
     */
    public function __construct(SponsorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sponsor\ManageSponsorRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSponsorRequest $request)
    {
        return new ViewResponse('backend.sponsors.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSponsorRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sponsor\CreateResponse
     */
    public function create(CreateSponsorRequest $request)
    {
        $sponsorCategory = Sponsorcategory::all();
        return new CreateResponse( $sponsorCategory);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSponsorRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSponsorRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sponsors.index'), ['flash_success' => trans('alerts.backend.sponsors.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Sponsor\Sponsor  $sponsor
     * @param  EditSponsorRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sponsor\EditResponse
     */
    public function edit(Sponsor $sponsor, EditSponsorRequest $request)
    {
        $sponsorcategory = Sponsorcategory::all();
        return new EditResponse($sponsor, $sponsorcategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSponsorRequestNamespace  $request
     * @param  App\Models\Sponsor\Sponsor  $sponsor
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sponsor, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sponsors.index'), ['flash_success' => trans('alerts.backend.sponsors.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSponsorRequestNamespace  $request
     * @param  App\Models\Sponsor\Sponsor  $sponsor
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sponsor $sponsor, DeleteSponsorRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sponsor);
        //returning with successfull message
        return new RedirectResponse(route('admin.sponsors.index'), ['flash_success' => trans('alerts.backend.sponsors.deleted')]);
    }
    
}
