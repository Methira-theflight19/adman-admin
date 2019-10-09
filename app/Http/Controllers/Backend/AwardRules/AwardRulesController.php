<?php

namespace App\Http\Controllers\Backend\AwardRules;

use App\Models\AwardRules\AwardRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AwardRules\CreateResponse;
use App\Http\Responses\Backend\AwardRules\EditResponse;
use App\Repositories\Backend\AwardRules\AwardRuleRepository;
use App\Http\Requests\Backend\AwardRules\ManageAwardRuleRequest;
use App\Http\Requests\Backend\AwardRules\CreateAwardRuleRequest;
use App\Http\Requests\Backend\AwardRules\StoreAwardRuleRequest;
use App\Http\Requests\Backend\AwardRules\EditAwardRuleRequest;
use App\Http\Requests\Backend\AwardRules\UpdateAwardRuleRequest;
use App\Http\Requests\Backend\AwardRules\DeleteAwardRuleRequest;

/**
 * AwardRulesController
 */
class AwardRulesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardRuleRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AwardRuleRepository $repository;
     */
    public function __construct(AwardRuleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AwardRules\ManageAwardRuleRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAwardRuleRequest $request)
    {
        return new ViewResponse('backend.awardrules.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAwardRuleRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardRules\CreateResponse
     */
    public function create(CreateAwardRuleRequest $request)
    {
        return new CreateResponse('backend.awardrules.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAwardRuleRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAwardRuleRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.awardrules.index'), ['flash_success' => trans('alerts.backend.awardrules.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AwardRules\AwardRule  $awardrule
     * @param  EditAwardRuleRequestNamespace  $request
     * @return \App\Http\Responses\Backend\AwardRules\EditResponse
     */
    public function edit(AwardRule $awardrule, EditAwardRuleRequest $request)
    {
        return new EditResponse($awardrule);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAwardRuleRequestNamespace  $request
     * @param  App\Models\AwardRules\AwardRule  $awardrule
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAwardRuleRequest $request, AwardRule $awardrule)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $awardrule, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.awardrules.index'), ['flash_success' => trans('alerts.backend.awardrules.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAwardRuleRequestNamespace  $request
     * @param  App\Models\AwardRules\AwardRule  $awardrule
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AwardRule $awardrule, DeleteAwardRuleRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($awardrule);
        //returning with successfull message
        return new RedirectResponse(route('admin.awardrules.index'), ['flash_success' => trans('alerts.backend.awardrules.deleted')]);
    }
    
}
