<?php

namespace App\Http\Controllers\Backend\TopicTalk;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\TopicTalk\TopicTalkRepository;
use App\Http\Requests\Backend\TopicTalk\ManageTopicTalkRequest;

/**
 * Class TopicTalksTableController.
 */
class TopicTalksTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TopicTalkRepository
     */
    protected $topictalk;

    /**
     * contructor to initialize repository object
     * @param TopicTalkRepository $topictalk;
     */
    public function __construct(TopicTalkRepository $topictalk)
    {
        $this->topictalk = $topictalk;
    }

    /**
     * This method return the data of the model
     * @param ManageTopicTalkRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTopicTalkRequest $request)
    {
        return Datatables::of($this->topictalk->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($topictalk) {
                return Carbon::parse($topictalk->created_at)->toDateString();
            })
            ->addColumn('actions', function ($topictalk) {
                return $topictalk->action_buttons;
            })
            ->make(true);
    }
}
