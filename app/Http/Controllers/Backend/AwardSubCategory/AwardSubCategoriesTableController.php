<?php

namespace App\Http\Controllers\Backend\AwardSubCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AwardSubCategory\AwardSubCategoryRepository;
use App\Http\Requests\Backend\AwardSubCategory\ManageAwardSubCategoryRequest;
use App\Models\AwardCategory\AwardCategory;
/**
 * Class AwardSubCategoriesTableController.
 */
class AwardSubCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardSubCategoryRepository
     */
    protected $awardsubcategory;

    /**
     * contructor to initialize repository object
     * @param AwardSubCategoryRepository $awardsubcategory;
     */
    public function __construct(AwardSubCategoryRepository $awardsubcategory)
    {
        $this->awardsubcategory = $awardsubcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageAwardSubCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAwardSubCategoryRequest $request)
    {
        return Datatables::of($this->awardsubcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('category', function ($awardsubcategory) {
                $selectedcat = $awardsubcategory->category->pluck('id');
                $awardCategories = AwardCategory::where('id',$selectedcat[0])->first();
                 return $awardCategories->name;
            })
            ->addColumn('created_at', function ($awardsubcategory) {
                return Carbon::parse($awardsubcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($awardsubcategory) {
                return $awardsubcategory->action_buttons;
            })
            ->make(true);
    }
}
