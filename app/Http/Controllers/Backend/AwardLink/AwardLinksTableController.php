<?php

namespace App\Http\Controllers\Backend\AwardLink;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AwardLink\AwardLinkRepository;
use App\Http\Requests\Backend\AwardLink\ManageAwardLinkRequest;

/**
 * Class AwardLinksTableController.
 */
class AwardLinksTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AwardLinkRepository
     */
    protected $awardlink;

    /**
     * contructor to initialize repository object
     * @param AwardLinkRepository $awardlink;
     */
    public function __construct(AwardLinkRepository $awardlink)
    {
        $this->awardlink = $awardlink;
    }

    /**
     * This method return the data of the model
     * @param ManageAwardLinkRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAwardLinkRequest $request)
    {
        return Datatables::of($this->awardlink->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($awardlink) {
                return Carbon::parse($awardlink->created_at)->toDateString();
            })
            ->addColumn('actions', function ($awardlink) {
                return $awardlink->action_buttons;
            })
            ->make(true);
    }
}
