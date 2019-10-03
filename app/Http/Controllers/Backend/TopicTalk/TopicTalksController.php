<?php

namespace App\Http\Controllers\Backend\TopicTalk;

use App\Models\TopicTalk\TopicTalk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\TopicTalk\CreateResponse;
use App\Http\Responses\Backend\TopicTalk\EditResponse;
use App\Repositories\Backend\TopicTalk\TopicTalkRepository;
use App\Http\Requests\Backend\TopicTalk\ManageTopicTalkRequest;
use App\Http\Requests\Backend\TopicTalk\CreateTopicTalkRequest;
use App\Http\Requests\Backend\TopicTalk\StoreTopicTalkRequest;
use App\Http\Requests\Backend\TopicTalk\EditTopicTalkRequest;
use App\Http\Requests\Backend\TopicTalk\UpdateTopicTalkRequest;
use App\Http\Requests\Backend\TopicTalk\DeleteTopicTalkRequest;

/**
 * TopicTalksController
 */
class TopicTalksController extends Controller
{
    /**
     * variable to store the repository object
     * @var TopicTalkRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TopicTalkRepository $repository;
     */
    public function __construct(TopicTalkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\TopicTalk\ManageTopicTalkRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTopicTalkRequest $request)
    {
        return new ViewResponse('backend.topictalks.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTopicTalkRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TopicTalk\CreateResponse
     */
    public function create(CreateTopicTalkRequest $request)
    {
        return new CreateResponse('backend.topictalks.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTopicTalkRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTopicTalkRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.topictalks.index'), ['flash_success' => trans('alerts.backend.topictalks.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\TopicTalk\TopicTalk  $topictalk
     * @param  EditTopicTalkRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TopicTalk\EditResponse
     */
    public function edit(TopicTalk $topictalk, EditTopicTalkRequest $request)
    {
        return new EditResponse($topictalk);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTopicTalkRequestNamespace  $request
     * @param  App\Models\TopicTalk\TopicTalk  $topictalk
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTopicTalkRequest $request, TopicTalk $topictalk)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $topictalk, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.topictalks.index'), ['flash_success' => trans('alerts.backend.topictalks.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTopicTalkRequestNamespace  $request
     * @param  App\Models\TopicTalk\TopicTalk  $topictalk
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(TopicTalk $topictalk, DeleteTopicTalkRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($topictalk);
        //returning with successfull message
        return new RedirectResponse(route('admin.topictalks.index'), ['flash_success' => trans('alerts.backend.topictalks.deleted')]);
    }
    
}
