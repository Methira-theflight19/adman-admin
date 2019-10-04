<?php

namespace App\Http\Controllers\Backend\TalkPhoto;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\TalkPhoto\TalkPhotoRepository;
use App\Http\Requests\Backend\TalkPhoto\ManageTalkPhotoRequest;
use App\Models\TalkDetail\TalkDetail;

/**
 * Class TalkPhotosTableController.
 */
class TalkPhotosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TalkPhotoRepository
     */
    protected $talkphoto;

    /**
     * contructor to initialize repository object
     * @param TalkPhotoRepository $talkphoto;
     */
    public function __construct(TalkPhotoRepository $talkphoto)
    {
        $this->talkphoto = $talkphoto;
    }

    /**
     * This method return the data of the model
     * @param ManageTalkPhotoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTalkPhotoRequest $request)
    {
        return Datatables::of($this->talkphoto->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($talkphoto) {
                $url= asset('storage/img/talkdetailphoto/'.$talkphoto->image);
                return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('room', function ($talkphoto) {
                $selectedtalkdetail = $talkphoto->talkdetail->pluck('id');
                $talkdetail = TalkDetail::where('id',$selectedtalkdetail[0])->first();
                 return $talkdetail->name.' '.$talkdetail->time_start. ' - '.$talkdetail->time_end;
            })
            ->addColumn('created_at', function ($talkphoto) {
                return Carbon::parse($talkphoto->created_at)->toDateString();
            })
            ->addColumn('created_at', function ($talkphoto) {
                return Carbon::parse($talkphoto->created_at)->toDateString();
            })
            ->addColumn('actions', function ($talkphoto) {
                return $talkphoto->action_buttons;
            })
            ->make(true);
    }
}
