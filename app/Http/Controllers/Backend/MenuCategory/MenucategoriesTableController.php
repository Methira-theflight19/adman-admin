<?php

namespace App\Http\Controllers\Backend\MenuCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\MenuCategory\MenucategoryRepository;
use App\Http\Requests\Backend\MenuCategory\ManageMenucategoryRequest;

/**
 * Class MenucategoriesTableController.
 */
class MenucategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var MenucategoryRepository
     */
    protected $menucategory;

    /**
     * contructor to initialize repository object
     * @param MenucategoryRepository $menucategory;
     */
    public function __construct(MenucategoryRepository $menucategory)
    {
        $this->menucategory = $menucategory;
    }

    /**
     * This method return the data of the model
     * @param ManageMenucategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMenucategoryRequest $request)
    {
        return Datatables::of($this->menucategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($menucategory) {
                return Carbon::parse($menucategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($menucategory) {
                return $menucategory->action_buttons;
            })
            ->make(true);
    }
}
