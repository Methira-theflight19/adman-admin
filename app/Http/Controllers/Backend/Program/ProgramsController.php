<?php

namespace App\Http\Controllers\Backend\Program;

use App\Models\Program\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Program\CreateResponse;
use App\Http\Responses\Backend\Program\EditResponse;
use App\Repositories\Backend\Program\ProgramRepository;
use App\Http\Requests\Backend\Program\ManageProgramRequest;
use App\Http\Requests\Backend\Program\CreateProgramRequest;
use App\Http\Requests\Backend\Program\StoreProgramRequest;
use App\Http\Requests\Backend\Program\EditProgramRequest;
use App\Http\Requests\Backend\Program\UpdateProgramRequest;
use App\Http\Requests\Backend\Program\DeleteProgramRequest;

/**
 * ProgramsController
 */
class ProgramsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProgramRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProgramRepository $repository;
     */
    public function __construct(ProgramRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Program\ManageProgramRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageProgramRequest $request)
    {
        return new ViewResponse('backend.programs.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProgramRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Program\CreateResponse
     */
    public function create(CreateProgramRequest $request)
    {
        return new CreateResponse('backend.programs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProgramRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreProgramRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.programs.index'), ['flash_success' => trans('alerts.backend.programs.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Program\Program  $program
     * @param  EditProgramRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Program\EditResponse
     */
    public function edit(Program $program, EditProgramRequest $request)
    {
        return new EditResponse($program);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProgramRequestNamespace  $request
     * @param  App\Models\Program\Program  $program
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $program, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.programs.index'), ['flash_success' => trans('alerts.backend.programs.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProgramRequestNamespace  $request
     * @param  App\Models\Program\Program  $program
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Program $program, DeleteProgramRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($program);
        //returning with successfull message
        return new RedirectResponse(route('admin.programs.index'), ['flash_success' => trans('alerts.backend.programs.deleted')]);
    }
    
}
