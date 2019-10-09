<?php

namespace App\Http\Controllers\Backend\AchiveSubCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AchiveSubCategory\AchiveSubCategoryRepository;
use App\Http\Requests\Backend\AchiveSubCategory\ManageAchiveSubCategoryRequest;
use App\Models\AchiveCategory\AchiveCategory;
/**
 * Class AchiveSubCategoriesTableController.
 */
class AchiveSubCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AchiveSubCategoryRepository
     */
    protected $achivesubcategory;

    /**
     * contructor to initialize repository object
     * @param AchiveSubCategoryRepository $achivesubcategory;
     */
    public function __construct(AchiveSubCategoryRepository $achivesubcategory)
    {
        $this->achivesubcategory = $achivesubcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageAchiveSubCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAchiveSubCategoryRequest $request)
    {
        return Datatables::of($this->achivesubcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('category', function ($achivesubcategory) {
                $selectedcat = $achivesubcategory->category->pluck('id');
                $achiveCategories = AchiveCategory::where('id',$selectedcat[0])->first();
                 return $achiveCategories->name;
            })
            ->addColumn('created_at', function ($achivesubcategory) {
                return Carbon::parse($achivesubcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($achivesubcategory) {
                return $achivesubcategory->action_buttons;
            })
            ->make(true);
    }
}
