<?php

namespace App\Http\Controllers\Backend\Winner;

use App\Models\Winner\Winner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Winner\CreateResponse;
use App\Http\Responses\Backend\Winner\EditResponse;
use App\Repositories\Backend\Winner\WinnerRepository;
use App\Http\Requests\Backend\Winner\ManageWinnerRequest;
use App\Http\Requests\Backend\Winner\CreateWinnerRequest;
use App\Http\Requests\Backend\Winner\StoreWinnerRequest;
use App\Http\Requests\Backend\Winner\EditWinnerRequest;
use App\Http\Requests\Backend\Winner\UpdateWinnerRequest;
use App\Http\Requests\Backend\Winner\DeleteWinnerRequest;

/**
 * WinnersController
 */
class WinnersController extends Controller
{
    /**
     * variable to store the repository object
     * @var WinnerRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param WinnerRepository $repository;
     */
    public function __construct(WinnerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Winner\ManageWinnerRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageWinnerRequest $request)
    {
        return new ViewResponse('backend.winners.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateWinnerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Winner\CreateResponse
     */
    public function create(CreateWinnerRequest $request)
    {
        return new CreateResponse('backend.winners.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreWinnerRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreWinnerRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.winners.index'), ['flash_success' => trans('alerts.backend.winners.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Winner\Winner  $winner
     * @param  EditWinnerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Winner\EditResponse
     */
    public function edit(Winner $winner, EditWinnerRequest $request)
    {
        return new EditResponse($winner);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateWinnerRequestNamespace  $request
     * @param  App\Models\Winner\Winner  $winner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateWinnerRequest $request, Winner $winner)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $winner, $input );
        //return with successfull message
        // return new RedirectResponse(route('admin.winners.index'), ['flash_success' => trans('alerts.backend.winners.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteWinnerRequestNamespace  $request
     * @param  App\Models\Winner\Winner  $winner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Winner $winner, DeleteWinnerRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($winner);
        //returning with successfull message
        return new RedirectResponse(route('admin.winners.index'), ['flash_success' => trans('alerts.backend.winners.deleted')]);
    }
    
}
