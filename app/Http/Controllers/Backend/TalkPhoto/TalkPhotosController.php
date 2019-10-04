<?php

namespace App\Http\Controllers\Backend\TalkPhoto;

use App\Models\TalkPhoto\TalkPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\Backend\TalkPhoto\IndexResponse;
use App\Http\Responses\Backend\TalkPhoto\CreateResponse;
use App\Http\Responses\Backend\TalkPhoto\EditResponse;
use App\Repositories\Backend\TalkPhoto\TalkPhotoRepository;
use App\Http\Requests\Backend\TalkPhoto\ManageTalkPhotoRequest;
use App\Http\Requests\Backend\TalkPhoto\CreateTalkPhotoRequest;
use App\Http\Requests\Backend\TalkPhoto\StoreTalkPhotoRequest;
use App\Http\Requests\Backend\TalkPhoto\EditTalkPhotoRequest;
use App\Http\Requests\Backend\TalkPhoto\UpdateTalkPhotoRequest;
use App\Http\Requests\Backend\TalkPhoto\DeleteTalkPhotoRequest;
use App\Models\TalkDetail\TalkDetail;


/**
 * TalkPhotosController
 */
class TalkPhotosController extends Controller
{
    /**
     * variable to store the repository object
     * @var TalkPhotoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TalkPhotoRepository $repository;
     */
    public function __construct(TalkPhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\TalkPhoto\ManageTalkPhotoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTalkPhotoRequest $request)
    {
        $talkdetail = TalkDetail::all();
        return new IndexResponse($talkdetail);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTalkPhotoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TalkPhoto\CreateResponse
     */
    public function create(CreateTalkPhotoRequest $request)
    {
        $talkdetail = TalkDetail::with('room')->get();
        return new CreateResponse($talkdetail);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTalkPhotoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTalkPhotoRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.talkphotos.index'), ['flash_success' => trans('alerts.backend.talkphotos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\TalkPhoto\TalkPhoto  $talkphoto
     * @param  EditTalkPhotoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TalkPhoto\EditResponse
     */
    public function edit(TalkPhoto $talkphoto, EditTalkPhotoRequest $request)
    {
        $talkdetail = TalkDetail::all();
        return new EditResponse($talkphoto,$talkdetail);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTalkPhotoRequestNamespace  $request
     * @param  App\Models\TalkPhoto\TalkPhoto  $talkphoto
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTalkPhotoRequest $request, TalkPhoto $talkphoto)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $talkphoto, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.talkphotos.index'), ['flash_success' => trans('alerts.backend.talkphotos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTalkPhotoRequestNamespace  $request
     * @param  App\Models\TalkPhoto\TalkPhoto  $talkphoto
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(TalkPhoto $talkphoto, DeleteTalkPhotoRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($talkphoto);
        //returning with successfull message
        return new RedirectResponse(route('admin.talkphotos.index'), ['flash_success' => trans('alerts.backend.talkphotos.deleted')]);
    }
    
}
