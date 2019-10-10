<?php

namespace App\Repositories\Backend\AwardLink;

use DB;
use Carbon\Carbon;
use App\Models\AwardLink\AwardLink;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class AwardLinkRepository.
 */
class AwardLinkRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AwardLink::class;

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
        $this->upload_path = 'pdf'.DIRECTORY_SEPARATOR.'award'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.awardlinks.table').'.id',
                config('module.awardlinks.table').'.link1',
                config('module.awardlinks.table').'.link2',
                config('module.awardlinks.table').'.created_at',
                config('module.awardlinks.table').'.updated_at',
            ]);
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AwardLink $awardlink
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AwardLink $awardlink, array $input)
    {
        if  (is_array($input) && array_key_exists('link1', $input)) {
            $this->deleteOldFile($awardlink);
            $input = $this->uploadImage($input);
        }
        if  (is_array($input) && array_key_exists('link2', $input)) {
            $this->deleteOldFile($awardlink);
            $input = $this->uploadImage($input);
        }
    	if ($awardlink->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.awardlinks.update_error'));
    }
    public function uploadImage($input)
    {
        $avatar = $input['link1'];

        if (isset($input['link1']) && !empty($input['link1'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['link1' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile($model)
    {
        $fileName = $model->link1;

        return $this->storage->delete($this->upload_path.$fileName);
    }
    public function uploadImage2($input)
    {
        $avatar = $input['link2'];

        if (isset($input['link2']) && !empty($input['link2'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['link2' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile2($model)
    {
        $fileName = $model->link2;

        return $this->storage->delete($this->upload_path.$fileName);
    }

}
