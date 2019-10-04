<?php

namespace App\Repositories\Backend\TalkPhoto;

use DB;
use Carbon\Carbon;
use App\Models\TalkPhoto\TalkPhoto;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\TalkDetailMapPhoto\TalkDetailMapPhoto;
use Illuminate\Support\Facades\Storage;

/**
 * Class TalkPhotoRepository.
 */
class TalkPhotoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = TalkPhoto::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'talkdetailphoto'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.talkphotos.table').'.id',
                config('module.talkphotos.table').'.image',
                config('module.talkphotos.table').'.name',
                config('module.talkphotos.table').'.created_at',
                config('module.talkphotos.table').'.updated_at',
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
        if(!empty($input['company_image	'])){
            $input = $this->uploadImage2($input);
        }

        $talkdetail = $input['talk_detail'];
        if ($talkphoto =  TalkPhoto::create($input)) {
            $talkphoto->talkdetail()->sync($talkdetail);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.talkphotos.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param TalkPhoto $talkphoto
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(TalkPhoto $talkphoto, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($talkphoto);
            $input = $this->uploadImage($input);
        }
        if (is_array($input) && array_key_exists('company_image', $input)) {
            $this->deleteOldFile2($talkphoto);
            $input = $this->uploadImage2($input);
        }
        $talkdetail = $input['talk_detail'];
    	if ($talkphoto->update($input)){
            $talkphoto->talkdetail()->sync($talkdetail);
            return true;
        }


        throw new GeneralException(trans('exceptions.backend.talkphotos.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param TalkPhoto $talkphoto
     * @throws GeneralException
     * @return bool
     */
    public function delete(TalkPhoto $talkphoto)
    {
        if ($talkphoto->delete()) {
            TalkDetailMapPhoto::where('photo_id', $talkphoto->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.talkphotos.delete_error'));
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
            $avatar = $input['company_image'];

            if (isset($input['company_image']) && !empty($input['company_image'])) {
                $fileName = time().$avatar->getClientOriginalName();
    
                $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));
    
                $input = array_merge($input, ['company_image' => $fileName]);
    
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
        $fileName = $model->company_image;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
