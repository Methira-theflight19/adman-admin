<?php

namespace App\Http\Controllers\Backend\Achive;

use App\Models\Achive\Achive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Achive\CreateResponse;
use App\Http\Responses\Backend\Achive\EditResponse;
use App\Repositories\Backend\Achive\AchiveRepository;
use App\Http\Requests\Backend\Achive\ManageAchiveRequest;
use App\Http\Requests\Backend\Achive\CreateAchiveRequest;
use App\Http\Requests\Backend\Achive\StoreAchiveRequest;
use App\Http\Requests\Backend\Achive\EditAchiveRequest;
use App\Http\Requests\Backend\Achive\UpdateAchiveRequest;
use App\Http\Requests\Backend\Achive\DeleteAchiveRequest;
use App\Models\AchiveCategory\AchiveCategory;
use App\Models\AchiveSubCategory\AchiveSubCategory;

/**
 * AchivesController
 */
class AchivesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AchiveRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AchiveRepository $repository;
     */
    public function __construct(AchiveRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Achive\ManageAchiveRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAchiveRequest $request)
    {
     
        return new ViewResponse('backend.achives.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAchiveRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Achive\CreateResponse
     */
    public function create(CreateAchiveRequest $request)
    {
        $achivecat = AchiveCategory::get();
        $achivesubcat = AchiveSubCategory::with('category')->get();
        return new CreateResponse($achivecat, $achivesubcat);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAchiveRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAchiveRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.achives.index'), ['flash_success' => trans('alerts.backend.achives.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Achive\Achive  $achive
     * @param  EditAchiveRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Achive\EditResponse
     */
    public function edit(Achive $achive, EditAchiveRequest $request)
    {
        $achivecat = AchiveCategory::get();
        $achivesubcat = AchiveSubCategory::with('category')->get();
        return new EditResponse($achive, $achivecat, $achivesubcat);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAchiveRequestNamespace  $request
     * @param  App\Models\Achive\Achive  $achive
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAchiveRequest $request, Achive $achive)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $achive, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.achives.index'), ['flash_success' => trans('alerts.backend.achives.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAchiveRequestNamespace  $request
     * @param  App\Models\Achive\Achive  $achive
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Achive $achive, DeleteAchiveRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($achive);
        //returning with successfull message
        return new RedirectResponse(route('admin.achives.index'), ['flash_success' => trans('alerts.backend.achives.deleted')]);
    }
    
}
