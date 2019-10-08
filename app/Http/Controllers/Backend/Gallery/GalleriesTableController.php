<?php

namespace App\Http\Controllers\Backend\Gallery;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Gallery\GalleryRepository;
use App\Http\Requests\Backend\Gallery\ManageGalleryRequest;
use App\Models\GalleryCategory\GalleryCategory;
/**
 * Class GalleriesTableController.
 */
class GalleriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var GalleryRepository
     */
    protected $gallery;

    /**
     * contructor to initialize repository object
     * @param GalleryRepository $gallery;
     */
    public function __construct(GalleryRepository $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * This method return the data of the model
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageGalleryRequest $request)
    {
        return Datatables::of($this->gallery->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('category', function ($gallery) {
                $selectedcat = $gallery->category->pluck('id');
                $galleryCategories = GalleryCategory::where('id',$selectedcat[0])->first();
                 return $galleryCategories->name;
            })
            ->addColumn('created_at', function ($gallery) {
                return Carbon::parse($gallery->created_at)->toDateString();
            })
            ->addColumn('actions', function ($gallery) {
                return $gallery->action_buttons;
            })
            ->make(true);
    }
}
