<?php

namespace App\Http\Controllers\Backend\Activity;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Activity\ActivityRepository;
use App\Http\Requests\Backend\Activity\ManageActivityRequest;

/**
 * Class ActivitiesTableController.
 */
class ActivitiesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ActivityRepository
     */
    protected $activity;

    /**
     * contructor to initialize repository object
     * @param ActivityRepository $activity;
     */
    public function __construct(ActivityRepository $activity)
    {
        $this->activity = $activity;
    }

    /**
     * This method return the data of the model
     * @param ManageActivityRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageActivityRequest $request)
    {
        return Datatables::of($this->activity->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($activity) {
                $url= asset('storage/img/activity/'.$activity->image);
                 return '<img src="'.$url.'" border="0" width="100%" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($activity) {
                return Carbon::parse($activity->created_at)->toDateString();
            })
            ->addColumn('actions', function ($activity) {
                return $activity->action_buttons;
            })
            ->make(true);
    }
}
