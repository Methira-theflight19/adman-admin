<?php

namespace App\Repositories\Backend\RoomCategory;

use DB;
use Carbon\Carbon;
use App\Models\RoomCategory\RoomCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\TopicMapRoom\TopicMapRoom;


/**
 * Class RoomCategoryRepository.
 */
class RoomCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = RoomCategory::class;

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
                config('module.roomcategories.table').'.id',
                config('module.roomcategories.table').'.name',
                config('module.roomcategories.table').'.room',
                config('module.roomcategories.table').'.created_at',
                config('module.roomcategories.table').'.updated_at',
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
        $topictalk = $input['topic'];

        if ( $roomcategory = RoomCategory::create($input)) {
            $roomcategory->topictalk()->sync($topictalk);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.roomcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param RoomCategory $roomcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(RoomCategory $roomcategory, array $input)
    {

        $topic = $input['topic'];
        
    	if ($roomcategory->update($input)){
            $roomcategory->topictalk()->sync($topic);
            return true;
        }
         

        throw new GeneralException(trans('exceptions.backend.roomcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param RoomCategory $roomcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(RoomCategory $roomcategory)
    {
        if ($roomcategory->delete()) {
            TopicMapRoom::where('room_id', $roomcategory->id)->delete();
            return true;
        }
       

        throw new GeneralException(trans('exceptions.backend.roomcategories.delete_error'));
    }
}
