<?php

namespace App\Repositories\Backend\TopicTalk;

use DB;
use Carbon\Carbon;
use App\Models\TopicTalk\TopicTalk;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TopicTalkRepository.
 */
class TopicTalkRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = TopicTalk::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.topictalks.table').'.id',
                config('module.topictalks.table').'.name',
                config('module.topictalks.table').'.created_at',
                config('module.topictalks.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (TopicTalk::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.topictalks.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param TopicTalk $topictalk
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(TopicTalk $topictalk, array $input)
    {
    	if ($topictalk->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.topictalks.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param TopicTalk $topictalk
     * @throws GeneralException
     * @return bool
     */
    public function delete(TopicTalk $topictalk)
    {
        if ($topictalk->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.topictalks.delete_error'));
    }
}
