<?php

namespace App\Http\Controllers\Backend\JudgeCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\JudgeCategory\JudgeCategoryRepository;
use App\Http\Requests\Backend\JudgeCategory\ManageJudgeCategoryRequest;

/**
 * Class JudgeCategoriesTableController.
 */
class JudgeCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var JudgeCategoryRepository
     */
    protected $judgecategory;

    /**
     * contructor to initialize repository object
     * @param JudgeCategoryRepository $judgecategory;
     */
    public function __construct(JudgeCategoryRepository $judgecategory)
    {
        $this->judgecategory = $judgecategory;
    }

    /**
     * This method return the data of the model
     * @param ManageJudgeCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageJudgeCategoryRequest $request)
    {
        return Datatables::of($this->judgecategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('active', function ($gallerycategory) {
                if($gallerycategory->active == 0){
                    return "not active";
                }else{
                    return "active";
                }
            })
            ->addColumn('created_at', function ($judgecategory) {
                return Carbon::parse($judgecategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($judgecategory) {
                return $judgecategory->action_buttons;
            })
            ->make(true);
    }
}
