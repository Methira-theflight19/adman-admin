<?php

namespace App\Http\Controllers\Backend\Achive;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Achive\AchiveRepository;
use App\Http\Requests\Backend\Achive\ManageAchiveRequest;

/**
 * Class AchivesTableController.
 */
class AchivesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AchiveRepository
     */
    protected $achive;

    /**
     * contructor to initialize repository object
     * @param AchiveRepository $achive;
     */
    public function __construct(AchiveRepository $achive)
    {
        $this->achive = $achive;
    }

    /**
     * This method return the data of the model
     * @param ManageAchiveRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAchiveRequest $request)
    {
        return Datatables::of($this->achive->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($achive) {
                $url= asset('storage/img/archive/'.$achive->image);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($achive) {
                return Carbon::parse($achive->created_at)->toDateString();
            })
            ->addColumn('actions', function ($achive) {
                return $achive->action_buttons;
            })
            ->make(true);
    }
}
