<?php

namespace App\Http\Controllers\Backend\AboutCommittee;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AboutCommittee\AboutCommitteeRepository;
use App\Http\Requests\Backend\AboutCommittee\ManageAboutCommitteeRequest;
use App\Models\AboutCommitteeCategory\AboutCommitteeCategory;
/**
 * Class AboutCommitteesTableController.
 */
class AboutCommitteesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutCommitteeRepository
     */
    protected $aboutcommittee;

    /**
     * contructor to initialize repository object
     * @param AboutCommitteeRepository $aboutcommittee;
     */
    public function __construct(AboutCommitteeRepository $aboutcommittee)
    {
        $this->aboutcommittee = $aboutcommittee;
    }

    /**
     * This method return the data of the model
     * @param ManageAboutCommitteeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAboutCommitteeRequest $request)
    {
        return Datatables::of($this->aboutcommittee->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('category', function ($aboutcommittee) {
                $selectedmenu = $aboutcommittee->committeecat->pluck('id');
                $committeeCategories = AboutCommitteeCategory::where('id',$selectedmenu[0])->first();
                 return $committeeCategories->name;
            })
            ->addColumn('image', function ($aboutcommittee) {
                $url= asset('storage/img/about/committee/'.$aboutcommittee->committee_picture);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($aboutcommittee) {
                return Carbon::parse($aboutcommittee->created_at)->toDateString();
            })
            ->addColumn('actions', function ($aboutcommittee) {
                return $aboutcommittee->action_buttons;
            })
            ->make(true);
    }
}
