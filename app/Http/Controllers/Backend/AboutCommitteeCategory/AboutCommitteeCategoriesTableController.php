<?php

namespace App\Http\Controllers\Backend\AboutCommitteeCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AboutCommitteeCategory\AboutCommitteeCategoryRepository;
use App\Http\Requests\Backend\AboutCommitteeCategory\ManageAboutCommitteeCategoryRequest;

/**
 * Class AboutCommitteeCategoriesTableController.
 */
class AboutCommitteeCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutCommitteeCategoryRepository
     */
    protected $aboutcommitteecategory;

    /**
     * contructor to initialize repository object
     * @param AboutCommitteeCategoryRepository $aboutcommitteecategory;
     */
    public function __construct(AboutCommitteeCategoryRepository $aboutcommitteecategory)
    {
        $this->aboutcommitteecategory = $aboutcommitteecategory;
    }

    /**
     * This method return the data of the model
     * @param ManageAboutCommitteeCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAboutCommitteeCategoryRequest $request)
    {
        return Datatables::of($this->aboutcommitteecategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($aboutcommitteecategory) {
                return Carbon::parse($aboutcommitteecategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($aboutcommitteecategory) {
                return $aboutcommitteecategory->action_buttons;
            })
            ->make(true);
    }
}
