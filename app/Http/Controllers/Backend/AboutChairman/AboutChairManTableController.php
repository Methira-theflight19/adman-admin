<?php

namespace App\Http\Controllers\Backend\AboutChairman;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AboutChairman\AboutChairmanRepository;
use App\Http\Requests\Backend\AboutChairman\ManageAboutChairmanRequest;

/**
 * Class AboutChairManTableController.
 */
class AboutChairManTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutChairmanRepository
     */
    protected $aboutchairman;

    /**
     * contructor to initialize repository object
     * @param AboutChairmanRepository $aboutchairman;
     */
    public function __construct(AboutChairmanRepository $aboutchairman)
    {
        $this->aboutchairman = $aboutchairman;
    }

    /**
     * This method return the data of the model
     * @param ManageAboutChairmanRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAboutChairmanRequest $request)
    {
        return Datatables::of($this->aboutchairman->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($aboutchairman) {
                $url= asset('storage/img/about/chairman/'.$aboutchairman->image);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($aboutchairman) {
                return Carbon::parse($aboutchairman->created_at)->toDateString();
            })
            ->addColumn('actions', function ($aboutchairman) {
                return $aboutchairman->action_buttons;
            })
            ->make(true);
    }
}
