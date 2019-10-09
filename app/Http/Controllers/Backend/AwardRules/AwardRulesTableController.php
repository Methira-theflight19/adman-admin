<?php

namespace App\Http\Controllers\Backend\AwardRules;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AwardRules\AwardRuleRepository;
use App\Http\Requests\Backend\AwardRules\ManageAwardRuleRequest;

/**
 * Class AwardRulesTableController.
 */
class AwardRulesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardRuleRepository
     */
    protected $awardrule;

    /**
     * contructor to initialize repository object
     * @param AwardRuleRepository $awardrule;
     */
    public function __construct(AwardRuleRepository $awardrule)
    {
        $this->awardrule = $awardrule;
    }

    /**
     * This method return the data of the model
     * @param ManageAwardRuleRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAwardRuleRequest $request)
    {
        return Datatables::of($this->awardrule->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($awardrule) {
                return Carbon::parse($awardrule->created_at)->toDateString();
            })
            ->addColumn('actions', function ($awardrule) {
                return $awardrule->action_buttons;
            })
            ->make(true);
    }
}
