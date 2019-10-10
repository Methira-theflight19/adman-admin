<?php

namespace App\Repositories\Backend\AchiveCategory;

use DB;
use Carbon\Carbon;
use App\Models\AchiveCategory\AchiveCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class AchiveCategoryRepository.
 */
class AchiveCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AchiveCategory::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    protected $upload_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;
    public function __construct()
    {
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'achive'.DIRECTORY_SEPARATOR.'icon'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.achivecategories.table').'.id',
                config('module.achivecategories.table').'.name',
                config('module.achivecategories.table').'.subtitle',
                config('module.achivecategories.table').'.image',
                config('module.achivecategories.table').'.created_at',
                config('module.achivecategories.table').'.updated_at',
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
        $input = $this->uploadImage($input);
        if (AchiveCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.achivecategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AchiveCategory $achivecategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AchiveCategory $achivecategory, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($banner);
            $input = $this->uploadImage($input);
        }
    	if ($achivecategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.achivecategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AchiveCategory $achivecategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(AchiveCategory $achivecategory)
    {

        if ($achivecategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.achivecategories.delete_error'));
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
