<?php

namespace App\Http\Controllers\Backend\SponsorCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\SponsorCategory\SponsorcategoryRepository;
use App\Http\Requests\Backend\SponsorCategory\ManageSponsorcategoryRequest;

/**
 * Class SponsorcategoriesTableController.
 */
class SponsorcategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SponsorcategoryRepository
     */
    protected $sponsorcategory;

    /**
     * contructor to initialize repository object
     * @param SponsorcategoryRepository $sponsorcategory;
     */
    public function __construct(SponsorcategoryRepository $sponsorcategory)
    {
        $this->sponsorcategory = $sponsorcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageSponsorcategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSponsorcategoryRequest $request)
    {
        return Datatables::of($this->sponsorcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sponsorcategory) {
                return Carbon::parse($sponsorcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sponsorcategory) {
                return $sponsorcategory->action_buttons;
            })
            ->make(true);
    }
}
