<?php

namespace App\Repositories\Backend\TalkDetail;

use DB;
use Carbon\Carbon;
use App\Models\TalkDetail\TalkDetail;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomMapDetail\RoomMapDetail;

/**
 * Class TalkDetailRepository.
 */
class TalkDetailRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = TalkDetail::class;

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
                config('module.talkdetails.table').'.id',
                config('module.talkdetails.table').'.time_start',
                config('module.talkdetails.table').'.time_end',
                config('module.talkdetails.table').'.created_at',
                config('module.talkdetails.table').'.updated_at',
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
        $rooms = $input['room'];
        if ($talkdetail = TalkDetail::create($input)) {
            $talkdetail->room()->sync($rooms);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.talkdetails.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param TalkDetail $talkdetail
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(TalkDetail $talkdetail, array $input)
    {
        $room = $input['room'];
        if ($talkdetail->update($input))
            $talkdetail->room()->sync($room);
            return true;

        throw new GeneralException(trans('exceptions.backend.talkdetails.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param TalkDetail $talkdetail
     * @throws GeneralException
     * @return bool
     */
    public function delete(TalkDetail $talkdetail)
    {
        if ($talkdetail->delete()) {
            RoomMapDetail::where('detail_id', $talkdetail->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.talkdetails.delete_error'));
    }
}
