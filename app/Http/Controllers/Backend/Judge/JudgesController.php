<?php

namespace App\Http\Controllers\Backend\Judge;

use App\Models\Judge\Judge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Judge\CreateResponse;
use App\Http\Responses\Backend\Judge\EditResponse;
use App\Repositories\Backend\Judge\JudgeRepository;
use App\Http\Requests\Backend\Judge\ManageJudgeRequest;
use App\Http\Requests\Backend\Judge\CreateJudgeRequest;
use App\Http\Requests\Backend\Judge\StoreJudgeRequest;
use App\Http\Requests\Backend\Judge\EditJudgeRequest;
use App\Http\Requests\Backend\Judge\UpdateJudgeRequest;
use App\Http\Requests\Backend\Judge\DeleteJudgeRequest;
use App\Models\JudgeCategory\JudgeCategory;

/**
 * JudgesController
 */
class JudgesController extends Controller
{
    /**
     * variable to store the repository object
     * @var JudgeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param JudgeRepository $repository;
     */
    public function __construct(JudgeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Judge\ManageJudgeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageJudgeRequest $request)
    {
        return new ViewResponse('backend.judges.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateJudgeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Judge\CreateResponse
     */
    public function create(CreateJudgeRequest $request)
    {
        $judgeCategory = JudgeCategory::all();
        return new CreateResponse($judgeCategory);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreJudgeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreJudgeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.judges.index'), ['flash_success' => trans('alerts.backend.judges.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Judge\Judge  $judge
     * @param  EditJudgeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Judge\EditResponse
     */
    public function edit(Judge $judge, EditJudgeRequest $request)
    {
        $judgeCategory = JudgeCategory::all();
        return new EditResponse($judge,$judgeCategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateJudgeRequestNamespace  $request
     * @param  App\Models\Judge\Judge  $judge
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateJudgeRequest $request, Judge $judge)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $judge, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.judges.index'), ['flash_success' => trans('alerts.backend.judges.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteJudgeRequestNamespace  $request
     * @param  App\Models\Judge\Judge  $judge
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Judge $judge, DeleteJudgeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($judge);
        //returning with successfull message
        return new RedirectResponse(route('admin.judges.index'), ['flash_success' => trans('alerts.backend.judges.deleted')]);
    }
    
}
