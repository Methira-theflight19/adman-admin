<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Models\Gallery\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Gallery\IndexResponse;
use App\Http\Responses\Backend\Gallery\CreateResponse;
use App\Http\Responses\Backend\Gallery\EditResponse;
use App\Repositories\Backend\Gallery\GalleryRepository;
use App\Http\Requests\Backend\Gallery\ManageGalleryRequest;
use App\Http\Requests\Backend\Gallery\CreateGalleryRequest;
use App\Http\Requests\Backend\Gallery\StoreGalleryRequest;
use App\Http\Requests\Backend\Gallery\EditGalleryRequest;
use App\Http\Requests\Backend\Gallery\UpdateGalleryRequest;
use App\Http\Requests\Backend\Gallery\DeleteGalleryRequest;
use App\Models\GalleryCategory\GalleryCategory;

/**
 * GalleriesController
 */
class GalleriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var GalleryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param GalleryRepository $repository;
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Gallery\ManageGalleryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageGalleryRequest $request)
    {
        $galleryCategories = GalleryCategory::all();
        return new IndexResponse($galleryCategories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateGalleryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Gallery\CreateResponse
     */
    public function create(CreateGalleryRequest $request)
    {
        $galleryCategories = GalleryCategory::all();
        return new CreateResponse($galleryCategories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGalleryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreGalleryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.galleries.index'), ['flash_success' => trans('alerts.backend.galleries.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Gallery\Gallery  $gallery
     * @param  EditGalleryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Gallery\EditResponse
     */
    public function edit(Gallery $gallery, EditGalleryRequest $request)
    {
        $galleryCategories = GalleryCategory::all();
        return new EditResponse($gallery,$galleryCategories);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGalleryRequestNamespace  $request
     * @param  App\Models\Gallery\Gallery  $gallery
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $gallery, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.galleries.index'), ['flash_success' => trans('alerts.backend.galleries.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteGalleryRequestNamespace  $request
     * @param  App\Models\Gallery\Gallery  $gallery
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Gallery $gallery, DeleteGalleryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($gallery);
        //returning with successfull message
        return new RedirectResponse(route('admin.galleries.index'), ['flash_success' => trans('alerts.backend.galleries.deleted')]);
    }
    
}
