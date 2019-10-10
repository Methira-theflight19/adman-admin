<?php

namespace App\Http\Controllers\Backend\Award;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Award\AwardRepository;
use App\Http\Requests\Backend\Award\ManageAwardRequest;
use App\Models\AwardSubCategory\AwardSubCategory;
use App\Models\AwardCategory\AwardCategory;


/**
 * Class AwardsTableController.
 */
class AwardsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardRepository
     */
    protected $award;

    /**
     * contructor to initialize repository object
     * @param AwardRepository $award;
     */
    public function __construct(AwardRepository $award)
    {
        $this->award = $award;
    }

    /**
     * This method return the data of the model
     * @param ManageAwardRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAwardRequest $request)
    {
        return Datatables::of($this->award->getForDataTable())
            ->escapeColumns(['id'])
            // ->addColumn('category', function ($award) {
            //     $selectedsubcat = $award->category->pluck('id');
            //     $awardsubcat = AwardSubCategory::with('category')->where('id',$selectedsubcat[0])->first();
            //     $awardcatid = $awardsubcat->category[0]->id;
            //     $awardcat = AwardCategory::where('id',$awardcatid)->first();
            //     $cat = $awardcat->name.' - '.$awardsubcat->name ;
            //      return  $cat;
            // })
            ->addColumn('created_at', function ($award) {
                return Carbon::parse($award->created_at)->toDateString();
            })
            ->addColumn('actions', function ($award) {
                return $award->action_buttons;
            })
            ->make(true);
    }
}
