<?php

namespace App\Repositories\Backend\Achive;

use DB;
use Carbon\Carbon;
use App\Models\Achive\Achive;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\AchiveMapAchiveSubCategory\AchiveMapAchiveSubCategory;

/**
 * Class AchiveRepository.
 */
class AchiveRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Achive::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'archive'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.achives.table').'.id',
                config('module.achives.table').'.name',
                config('module.achives.table').'.image',
                config('module.achives.table').'.brand',
                config('module.achives.table').'.agency',
                config('module.achives.table').'.created_at',
                config('module.achives.table').'.updated_at',
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
        $subcat = $input['subcategory'];
        $input = $this->uploadImage($input);
        if ($achive = Achive::create($input)) {
            $achive->category()->sync($subcat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.achives.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Achive $achive
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Achive $achive, array $input)
    {
        $subcat = $input['subcategory'];
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($achive);
            $input = $this->uploadImage($input);
        }
    	if ($achive->update($input)){
            $achive->category()->sync($subcat);
            return true;
        }
           

        throw new GeneralException(trans('exceptions.backend.achives.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Achive $achive
     * @throws GeneralException
     * @return bool
     */
    public function delete(Achive $achive)
    {
        if ($achive->delete()) {
            AchiveMapAchiveSubCategory::where('achive_id', $achive->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.achives.delete_error'));
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
