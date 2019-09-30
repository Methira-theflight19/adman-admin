<?php

namespace App\Repositories\Backend\Sponsor;

use DB;
use Carbon\Carbon;
use App\Models\Sponsor\Sponsor;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SponsorRepository.
 */
class SponsorRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sponsor::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'sponsor'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.sponsors.table').'.id',
                config('module.sponsors.table').'.sponsor_name',
                config('module.sponsors.table').'.sponsor_picture',
                config('module.sponsors.table').'.seo_title',
                config('module.sponsors.table').'.seo_alt',
                config('module.sponsors.table').'.seo_description',
                config('module.sponsors.table').'.link',
                config('module.sponsors.table').'.created_at',
                config('module.sponsors.table').'.updated_at',
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

        $sponsorcat = $input['sponsor_category'];
        $input = $this->uploadImage($input);
        if ($sponser = Sponsor::create($input)) {
            $sponser->category()->sync($sponsorcat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sponsors.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sponsor $sponsor
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sponsor $sponsor, array $input)
    {
        $sponsorcat = $input['sponsor_category'];
        if  (is_array($input) && array_key_exists('sponsor_picture', $input)) {
            $this->deleteOldFile($banner);
            $input = $this->uploadImage($input);
        }
        if ($sponsor->update($input)){
            $sponsor->category()->sync($sponsorcat);
        }
        
            return true;

        throw new GeneralException(trans('exceptions.backend.sponsors.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sponsor $sponsor
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sponsor $sponsor)
    {
        if ($sponsor->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sponsors.delete_error'));
    }
    public function uploadImage($input)
    {
        $avatar = $input['sponsor_picture'];

        if (isset($input['sponsor_picture']) && !empty($input['sponsor_picture'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['sponsor_picture' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile($model)
    {
        $fileName = $model->banner_picture;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
