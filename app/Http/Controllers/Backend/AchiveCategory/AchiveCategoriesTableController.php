<?php

namespace App\Http\Controllers\Backend\AchiveCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AchiveCategory\AchiveCategoryRepository;
use App\Http\Requests\Backend\AchiveCategory\ManageAchiveCategoryRequest;

/**
 * Class AchiveCategoriesTableController.
 */
class AchiveCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AchiveCategoryRepository
     */
    protected $achivecategory;

    /**
     * contructor to initialize repository object
     * @param AchiveCategoryRepository $achivecategory;
     */
    public function __construct(AchiveCategoryRepository $achivecategory)
    {
        $this->achivecategory = $achivecategory;
    }

    /**
     * This method return the data of the model
     * @param ManageAchiveCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAchiveCategoryRequest $request)
    {
        return Datatables::of($this->achivecategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($achivecategory) {
                $url= asset('storage/img/achive/icon/'.$achivecategory->image);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($achivecategory) {
                return Carbon::parse($achivecategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($achivecategory) {
                return $achivecategory->action_buttons;
            })
            ->make(true);
    }
}
