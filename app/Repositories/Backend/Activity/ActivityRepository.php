<?php

namespace App\Repositories\Backend\Activity;

use DB;
use Carbon\Carbon;
use App\Models\Activity\Activity;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class ActivityRepository.
 */
class ActivityRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Activity::class;


    protected $upload_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'activity'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

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
                config('module.activities.table').'.id',
                config('module.activities.table').'.name',
                config('module.activities.table').'.publish_datetime',
                config('module.activities.table').'.image',
                config('module.activities.table').'.sort',
                config('module.activities.table').'.status',
                config('module.activities.table').'.created_at',
                config('module.activities.table').'.updated_at',
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
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        $input = $this->uploadImage($input);
        if (Activity::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.activities.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Activity $activity
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Activity $activity, array $input)
    {
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        if (array_key_exists('image', $input)) {
            $this->deleteOldFile($activity);
            $input = $this->uploadImage($input);
        }
        
    	if ($activity->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.activities.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Activity $activity
     * @throws GeneralException
     * @return bool
     */
    public function delete(Activity $activity)
    {
        if ($activity->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.activities.delete_error'));
    }

    public function uploadImage($input)
    {
        $avatar = $input['image'];

        if (isset($input['image']) && !empty($input['image'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['image' => $fileName]);

            return $input;
        }
    }

    public function deleteOldFile($model)
    {
        $fileName = $model->image;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
