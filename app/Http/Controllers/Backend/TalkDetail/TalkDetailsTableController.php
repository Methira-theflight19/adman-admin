<?php

namespace App\Http\Controllers\Backend\TalkDetail;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\TalkDetail\TalkDetailRepository;
use App\Http\Requests\Backend\TalkDetail\ManageTalkDetailRequest;
use App\Models\RoomCategory\RoomCategory;
/**
 * Class TalkDetailsTableController.
 */
class TalkDetailsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TalkDetailRepository
     */
    protected $talkdetail;

    /**
     * contructor to initialize repository object
     * @param TalkDetailRepository $talkdetail;
     */
    public function __construct(TalkDetailRepository $talkdetail)
    {
        $this->talkdetail = $talkdetail;
    }

    /**
     * This method return the data of the model
     * @param ManageTalkDetailRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTalkDetailRequest $request)
    {
        return Datatables::of($this->talkdetail->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('room', function ($talkdetail) {
                $selectedroom = $talkdetail->room->pluck('id');
                $Roomcat = RoomCategory::where('id',$selectedroom[0])->first();
                 return $Roomcat->name.' @'.$Roomcat->room;
            })
            ->addColumn('time', function ($talkdetail) {
                 return $talkdetail->time_start.' - '.$talkdetail->time_end;
            })
            ->addColumn('created_at', function ($talkdetail) {
                return Carbon::parse($talkdetail->created_at)->toDateString();
            })
            ->addColumn('actions', function ($talkdetail) {
                return $talkdetail->action_buttons;
            })
            ->make(true);
    }
}
