<?php

namespace App\Http\Controllers\Backend\Winner;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Winner\WinnerRepository;
use App\Http\Requests\Backend\Winner\ManageWinnerRequest;

/**
 * Class WinnersTableController.
 */
class WinnersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var WinnerRepository
     */
    protected $winner;

    /**
     * contructor to initialize repository object
     * @param WinnerRepository $winner;
     */
    public function __construct(WinnerRepository $winner)
    {
        $this->winner = $winner;
    }

    /**
     * This method return the data of the model
     * @param ManageWinnerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageWinnerRequest $request)
    {
        return Datatables::of($this->winner->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($winner) {
                $url= asset('storage/img/winner/'.$winner->image);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($winner) {
                return Carbon::parse($winner->created_at)->toDateString();
            })
            ->addColumn('actions', function ($winner) {
                return $winner->action_buttons;
            })
            ->make(true);
    }
}
