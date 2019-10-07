<?php

namespace App\Http\Controllers\Backend\GalleryCategory;

use App\Models\GalleryCategory\GalleryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\GalleryCategory\CreateResponse;
use App\Http\Responses\Backend\GalleryCategory\EditResponse;
use App\Repositories\Backend\GalleryCategory\GalleryCategoryRepository;
use App\Http\Requests\Backend\GalleryCategory\ManageGalleryCategoryRequest;
use App\Http\Requests\Backend\GalleryCategory\CreateGalleryCategoryRequest;
use App\Http\Requests\Backend\GalleryCategory\StoreGalleryCategoryRequest;
use App\Http\Requests\Backend\GalleryCategory\EditGalleryCategoryRequest;
use App\Http\Requests\Backend\GalleryCategory\UpdateGalleryCategoryRequest;
use App\Http\Requests\Backend\GalleryCategory\DeleteGalleryCategoryRequest;

/**
 * GalleryCategoriesController
 */
class GalleryCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var GalleryCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param GalleryCategoryRepository $repository;
     */
    public function __construct(GalleryCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\GalleryCategory\ManageGalleryCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageGalleryCategoryRequest $request)
    {
        return new ViewResponse('backend.gallerycategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateGalleryCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\GalleryCategory\CreateResponse
     */
    public function create(CreateGalleryCategoryRequest $request)
    {
        return new CreateResponse('backend.gallerycategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGalleryCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreGalleryCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.gallerycategories.index'), ['flash_success' => trans('alerts.backend.gallerycategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\GalleryCategory\GalleryCategory  $gallerycategory
     * @param  EditGalleryCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\GalleryCategory\EditResponse
     */
    public function edit(GalleryCategory $gallerycategory, EditGalleryCategoryRequest $request)
    {
        return new EditResponse($gallerycategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGalleryCategoryRequestNamespace  $request
     * @param  App\Models\GalleryCategory\GalleryCategory  $gallerycategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateGalleryCategoryRequest $request, GalleryCategory $gallerycategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $gallerycategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.gallerycategories.index'), ['flash_success' => trans('alerts.backend.gallerycategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteGalleryCategoryRequestNamespace  $request
     * @param  App\Models\GalleryCategory\GalleryCategory  $gallerycategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(GalleryCategory $gallerycategory, DeleteGalleryCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($gallerycategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.gallerycategories.index'), ['flash_success' => trans('alerts.backend.gallerycategories.deleted')]);
    }
    
}
