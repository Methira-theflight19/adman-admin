<?php

namespace App\Repositories\Backend\AboutCommittee;

use DB;
use Carbon\Carbon;
use App\Models\AboutCommittee\AboutCommittee;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\AboutCommitteeMapCategory\AboutCommitteeMapCategory;
use Illuminate\Support\Facades\Storage;

/**
 * Class AboutCommitteeRepository.
 */
class AboutCommitteeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AboutCommittee::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'about'.DIRECTORY_SEPARATOR.'committee'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.aboutcommittees.table').'.id',
                config('module.aboutcommittees.table').'.name',
                config('module.aboutcommittees.table').'.committee_picture',
                config('module.aboutcommittees.table').'.created_at',
                config('module.aboutcommittees.table').'.updated_at',
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
        $committeecat = $input['committeecat'];
        $input = $this->uploadImage($input);
        if ($aboutcommittee = AboutCommittee::create($input)) {
            $aboutcommittee->committeecat()->sync($committeecat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.aboutcommittees.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AboutCommittee $aboutcommittee
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AboutCommittee $aboutcommittee, array $input)
    {
        if  (is_array($input) && array_key_exists('committee_picture', $input)) {
            $this->deleteOldFile($aboutcommittee);
            $input = $this->uploadImage($input);
        }
        $committeecat = $input['committeecat'];
    	if ($aboutcommittee->update($input)){
            $aboutcommittee->committeecat()->sync($committeecat);
            return true;
        }


        throw new GeneralException(trans('exceptions.backend.aboutcommittees.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AboutCommittee $aboutcommittee
     * @throws GeneralException
     * @return bool
     */
    public function delete(AboutCommittee $aboutcommittee)
    {
        if ($aboutcommittee->delete()) {
            AboutCommitteeMapCategory::where('commitee_id', $aboutcommittee->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.aboutcommittees.delete_error'));
    }
    public function uploadImage($input)
    {
        $avatar = $input['committee_picture'];

        if (isset($input['committee_picture']) && !empty($input['committee_picture'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['committee_picture' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile($model)
    {
        $fileName = $model->committee_picture   ;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
