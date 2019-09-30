<?php

namespace App\Http\Controllers\Backend\Sponsor;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Sponsor\SponsorRepository;
use App\Http\Requests\Backend\Sponsor\ManageSponsorRequest;
use App\Models\SponsorCategory\Sponsorcategory;
/**
 * Class SponsorsTableController.
 */
class SponsorsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SponsorRepository
     */
    protected $sponsor;

    /**
     * contructor to initialize repository object
     * @param SponsorRepository $sponsor;
     */
    public function __construct(SponsorRepository $sponsor)
    {
        $this->sponsor = $sponsor;
    }

    /**
     * This method return the data of the model
     * @param ManageSponsorRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSponsorRequest $request)
    {
        return Datatables::of($this->sponsor->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('sponsor_cat', function ($sponsor) {
                $selectedcat = $sponsor->category->pluck('id');
                $sponsorCategory = Sponsorcategory::where('id',$selectedcat[0])->first();
                 return $sponsorCategory->sponsor_category;
            })
            ->addColumn('sponsor_picture', function ($sponsor) {
                $url= asset('storage/img/sponsor/'.$sponsor->sponsor_picture);
                 return '<img src="'.$url.'" border="0" width="100%" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($sponsor) {
                return Carbon::parse($sponsor->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sponsor) {
                return $sponsor->action_buttons;
            })
            ->make(true);
    }
}
