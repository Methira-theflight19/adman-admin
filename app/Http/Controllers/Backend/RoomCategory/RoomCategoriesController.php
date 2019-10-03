<?php

namespace App\Http\Controllers\Backend\RoomCategory;

use App\Models\RoomCategory\RoomCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\Backend\RoomCategory\IndexResponse;
use App\Http\Responses\Backend\RoomCategory\CreateResponse;
use App\Http\Responses\Backend\RoomCategory\EditResponse;
use App\Repositories\Backend\RoomCategory\RoomCategoryRepository;
use App\Http\Requests\Backend\RoomCategory\ManageRoomCategoryRequest;
use App\Http\Requests\Backend\RoomCategory\CreateRoomCategoryRequest;
use App\Http\Requests\Backend\RoomCategory\StoreRoomCategoryRequest;
use App\Http\Requests\Backend\RoomCategory\EditRoomCategoryRequest;
use App\Http\Requests\Backend\RoomCategory\UpdateRoomCategoryRequest;
use App\Http\Requests\Backend\RoomCategory\DeleteRoomCategoryRequest;
use App\Models\TopicTalk\TopicTalk;

/**
 * RoomCategoriesController
 */
class RoomCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var RoomCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RoomCategoryRepository $repository;
     */
    public function __construct(RoomCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\RoomCategory\ManageRoomCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageRoomCategoryRequest $request)
    {
        $topic = TopicTalk::all();
        return new IndexResponse($topic);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRoomCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\RoomCategory\CreateResponse
     */
    public function create(CreateRoomCategoryRequest $request)
    {
        $topic = TopicTalk::all();
        return new CreateResponse($topic);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoomCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreRoomCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.roomcategories.index'), ['flash_success' => trans('alerts.backend.roomcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\RoomCategory\RoomCategory  $roomcategory
     * @param  EditRoomCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\RoomCategory\EditResponse
     */
    public function edit(RoomCategory $roomcategory, EditRoomCategoryRequest $request)
    {
        $topic = TopicTalk::all();
        return new EditResponse($roomcategory,$topic);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoomCategoryRequestNamespace  $request
     * @param  App\Models\RoomCategory\RoomCategory  $roomcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateRoomCategoryRequest $request, RoomCategory $roomcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $roomcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.roomcategories.index'), ['flash_success' => trans('alerts.backend.roomcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRoomCategoryRequestNamespace  $request
     * @param  App\Models\RoomCategory\RoomCategory  $roomcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(RoomCategory $roomcategory, DeleteRoomCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($roomcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.roomcategories.index'), ['flash_success' => trans('alerts.backend.roomcategories.deleted')]);
    }
    
}
