<?php

namespace App\Http\Controllers\Backend\AwardCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AwardCategory\AwardCategoryRepository;
use App\Http\Requests\Backend\AwardCategory\ManageAwardCategoryRequest;

/**
 * Class AwardCategoriesTableController.
 */
class AwardCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardCategoryRepository
     */
    protected $awardcategory;

    /**
     * contructor to initialize repository object
     * @param AwardCategoryRepository $awardcategory;
     */
    public function __construct(AwardCategoryRepository $awardcategory)
    {
        $this->awardcategory = $awardcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageAwardCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAwardCategoryRequest $request)
    {
        return Datatables::of($this->awardcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($awardcategory) {
                $url= asset('storage/img/award/'.$awardcategory->image);
                return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('active', function ($awardcategory) {
                if($awardcategory->active == 0){
                    return "not active";
                }else{
                    return "active";
                }
            })
            ->addColumn('created_at', function ($awardcategory) {
                return Carbon::parse($awardcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($awardcategory) {
                return $awardcategory->action_buttons;
            })
            ->make(true);
    }
}
