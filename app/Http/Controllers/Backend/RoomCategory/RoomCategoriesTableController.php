<?php

namespace App\Http\Controllers\Backend\RoomCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\RoomCategory\RoomCategoryRepository;
use App\Http\Requests\Backend\RoomCategory\ManageRoomCategoryRequest;
use App\Models\TopicTalk\TopicTalk;

/**
 * Class RoomCategoriesTableController.
 */
class RoomCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var RoomCategoryRepository
     */
    protected $roomcategory;

    /**
     * contructor to initialize repository object
     * @param RoomCategoryRepository $roomcategory;
     */
    public function __construct(RoomCategoryRepository $roomcategory)
    {
        $this->roomcategory = $roomcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageRoomCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRoomCategoryRequest $request)
    {
        return Datatables::of($this->roomcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('topic', function ($roomcategory) {
                $selectedtopic = $roomcategory->topictalk->pluck('id');
                $topic = TopicTalk::where('id',$selectedtopic[0])->first();
                 return $topic->name;
            })
            ->addColumn('created_at', function ($roomcategory) {
                return Carbon::parse($roomcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($roomcategory) {
                return $roomcategory->action_buttons;
            })
            ->make(true);
    }
}
