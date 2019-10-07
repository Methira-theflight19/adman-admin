<?php

namespace App\Repositories\Backend\AboutChairman;

use DB;
use Carbon\Carbon;
use App\Models\AboutChairman\AboutChairman;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class AboutChairmanRepository.
 */
class AboutChairmanRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AboutChairman::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'about'.DIRECTORY_SEPARATOR.'chairman'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.aboutchairman.table').'.id',
                config('module.aboutchairman.table').'.image',
                config('module.aboutchairman.table').'.created_at',
                config('module.aboutchairman.table').'.updated_at',
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
        if(!empty($input['message_image'])){
            $input = $this->uploadImage2($input);
        }
        if (AboutChairman::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.aboutchairman.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AboutChairman $aboutchairman
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AboutChairman $aboutchairman, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($aboutchairman);
            $input = $this->uploadImage($input);
        }
        if (is_array($input) && array_key_exists('message_image', $input)) {
            $this->deleteOldFile2($aboutchairman);
            $input = $this->uploadImage2($input);
        }
    	if ($aboutchairman->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.aboutchairman.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AboutChairman $aboutchairman
     * @throws GeneralException
     * @return bool
     */
    public function delete(AboutChairman $aboutchairman)
    {
        if ($aboutchairman->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.aboutchairman.delete_error'));
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
    public function uploadImage2($input)
    {
            $avatar = $input['message_image'];

            if (isset($input['message_image']) && !empty($input['message_image'])) {
                $fileName = time().$avatar->getClientOriginalName();
    
                $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));
    
                $input = array_merge($input, ['message_image' => $fileName]);
    
                return $input;
            }
    }

    public function deleteOldFile($model)
    {
        $fileName = $model->image;

        return $this->storage->delete($this->upload_path.$fileName);
    }
    public function deleteOldFile2($model)
    {
        $fileName = $model->message_image;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
