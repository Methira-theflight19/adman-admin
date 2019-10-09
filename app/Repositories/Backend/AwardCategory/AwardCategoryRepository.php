<?php

namespace App\Repositories\Backend\AwardCategory;

use DB;
use Carbon\Carbon;
use App\Models\AwardCategory\AwardCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class AwardCategoryRepository.
 */
class AwardCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AwardCategory::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'award'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.awardcategories.table').'.id',
                config('module.awardcategories.table').'.name',
                config('module.awardcategories.table').'.image',
                config('module.awardcategories.table').'.subtitle',
                config('module.awardcategories.table').'.active',
                config('module.awardcategories.table').'.created_at',
                config('module.awardcategories.table').'.updated_at',
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
        if (AwardCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.awardcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AwardCategory $awardcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AwardCategory $awardcategory, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($banner);
            $input = $this->uploadImage($input);
        }
    	if ($awardcategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.awardcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AwardCategory $awardcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(AwardCategory $awardcategory)
    {
        if ($awardcategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.awardcategories.delete_error'));
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
