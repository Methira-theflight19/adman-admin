<?php

namespace App\Http\Controllers\Backend\TalkDetail;

use App\Models\TalkDetail\TalkDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\TalkDetail\IndexResponse;
use App\Http\Responses\Backend\TalkDetail\CreateResponse;
use App\Http\Responses\Backend\TalkDetail\EditResponse;
use App\Repositories\Backend\TalkDetail\TalkDetailRepository;
use App\Http\Requests\Backend\TalkDetail\ManageTalkDetailRequest;
use App\Http\Requests\Backend\TalkDetail\CreateTalkDetailRequest;
use App\Http\Requests\Backend\TalkDetail\StoreTalkDetailRequest;
use App\Http\Requests\Backend\TalkDetail\EditTalkDetailRequest;
use App\Http\Requests\Backend\TalkDetail\UpdateTalkDetailRequest;
use App\Http\Requests\Backend\TalkDetail\DeleteTalkDetailRequest;
use App\Models\RoomCategory\RoomCategory;

/**
 * TalkDetailsController
 */
class TalkDetailsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TalkDetailRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TalkDetailRepository $repository;
     */
    public function __construct(TalkDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\TalkDetail\ManageTalkDetailRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTalkDetailRequest $request)
    {
        $rooms = RoomCategory::all();
        return new IndexResponse($rooms);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTalkDetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TalkDetail\CreateResponse
     */
    public function create(CreateTalkDetailRequest $request)
    {
        $rooms = RoomCategory::all();
        return new CreateResponse($rooms);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTalkDetailRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTalkDetailRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.talkdetails.index'), ['flash_success' => trans('alerts.backend.talkdetails.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\TalkDetail\TalkDetail  $talkdetail
     * @param  EditTalkDetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TalkDetail\EditResponse
     */
    public function edit(TalkDetail $talkdetail, EditTalkDetailRequest $request)
    {
        $rooms = RoomCategory::all();
        return new EditResponse($talkdetail,$rooms);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTalkDetailRequestNamespace  $request
     * @param  App\Models\TalkDetail\TalkDetail  $talkdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTalkDetailRequest $request, TalkDetail $talkdetail)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $talkdetail, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.talkdetails.index'), ['flash_success' => trans('alerts.backend.talkdetails.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTalkDetailRequestNamespace  $request
     * @param  App\Models\TalkDetail\TalkDetail  $talkdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(TalkDetail $talkdetail, DeleteTalkDetailRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($talkdetail);
        //returning with successfull message
        return new RedirectResponse(route('admin.talkdetails.index'), ['flash_success' => trans('alerts.backend.talkdetails.deleted')]);
    }
    
}
