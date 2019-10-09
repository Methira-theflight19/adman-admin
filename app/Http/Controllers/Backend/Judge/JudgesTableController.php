<?php

namespace App\Http\Controllers\Backend\Judge;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Judge\JudgeRepository;
use App\Http\Requests\Backend\Judge\ManageJudgeRequest;
use App\Models\JudgeCategory\JudgeCategory;
/**
 * Class JudgesTableController.
 */
class JudgesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var JudgeRepository
     */
    protected $judge;

    /**
     * contructor to initialize repository object
     * @param JudgeRepository $judge;
     */
    public function __construct(JudgeRepository $judge)
    {
        $this->judge = $judge;
    }

    /**
     * This method return the data of the model
     * @param ManageJudgeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageJudgeRequest $request)
    {
        return Datatables::of($this->judge->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('judge_picture', function ($judge) {
                $url= asset('storage/img/judge/'.$judge->judge_picture);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('category', function ($judge) {
                $selectedcat = $judge->category->pluck('id');
                $judgeCategories = JudgeCategory::where('id',$selectedcat[0])->first();
                 return $judgeCategories->name;
            })
            ->addColumn('created_at', function ($judge) {
                return Carbon::parse($judge->created_at)->toDateString();
            })
            ->addColumn('actions', function ($judge) {
                return $judge->action_buttons;
            })
            ->make(true);
    }
}
