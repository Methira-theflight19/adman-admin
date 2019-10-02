<?php

namespace App\Http\Controllers\Backend\Banner;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Banner\BannerRepository;
use App\Http\Requests\Backend\Banner\ManageBannerRequest;
use App\Http\Responses\ViewResponse;
use App\Models\MenuCategory\Menucategory;

/**
 * Class BannersTableController.
 */
class BannersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BannerRepository
     */
    protected $banner;

    public function listView(ManageBannerRequest $request)
    {
        return new ViewResponse('backend.banners.list');
    }

    /**
     * contructor to initialize repository object
     * @param BannerRepository $banner;
     */
    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }

    /**
     * This method return the data of the model
     * @param ManageBannerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBannerRequest $request)
    {   
        //banner index table
        return Datatables::of($this->banner->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('menu', function ($banner) {
                $selectedmenu = $banner->menu->pluck('id');
                $menuCategories = Menucategory::where('id',$selectedmenu[0])->first();
                 return $menuCategories->menu_name;
            })
            ->addColumn('banner_picture', function ($banner) {
                $url= asset('storage/img/banner/'.$banner->banner_picture);
                 return '<img src="'.$url.'" border="0" width="100px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($banner) {
                return Carbon::parse($banner->created_at)->toDateString();
            })
            ->addColumn('actions', function ($banner) {
                return $banner->action_buttons;
            })
            ->make(true);
    }


}
