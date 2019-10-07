<?php

namespace App\Http\Controllers\Backend\GalleryCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\GalleryCategory\GalleryCategoryRepository;
use App\Http\Requests\Backend\GalleryCategory\ManageGalleryCategoryRequest;

/**
 * Class GalleryCategoriesTableController.
 */
class GalleryCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var GalleryCategoryRepository
     */
    protected $gallerycategory;

    /**
     * contructor to initialize repository object
     * @param GalleryCategoryRepository $gallerycategory;
     */
    public function __construct(GalleryCategoryRepository $gallerycategory)
    {
        $this->gallerycategory = $gallerycategory;
    }

    /**
     * This method return the data of the model
     * @param ManageGalleryCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageGalleryCategoryRequest $request)
    {
        return Datatables::of($this->gallerycategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('active', function ($gallerycategory) {
                if($gallerycategory->active == 0){
                    return "not active";
                }else{
                    return "active";
                }
            })
            ->addColumn('created_at', function ($gallerycategory) {
                return Carbon::parse($gallerycategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($gallerycategory) {
                return $gallerycategory->action_buttons;
            })
            ->make(true);
    }
}
