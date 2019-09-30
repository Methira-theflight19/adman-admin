<?php

namespace App\Repositories\Backend\Banner;

use DB;
use Carbon\Carbon;
use App\Models\Banner\Banner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\MenuCategory\Menucategory;
use App\Models\MenuMapBanner\MenuMapBanner;

/**
 * Class BannerRepository.
 */
class BannerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Banner::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'banner'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function getForDataTable($banner)
    {
        return $this->query()
            ->select([
                config('module.banners.table').'.id',
                config('module.banners.table').'.banner_name',
                config('module.banners.table').'.banner_picture',
                config('module.banners.table').'.banner_picture_sm',
                config('module.banners.table').'.banner_list',
                config('module.banners.table').'.seo_title',
                config('module.banners.table').'.seo_alt',
                config('module.banners.table').'.seo_description',
                config('module.banners.table').'.link',
                config('module.banners.table').'.created_by',
                config('module.banners.table').'.updated_by',
                config('module.banners.table').'.created_at',
                config('module.banners.table').'.updated_at',
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
        $menucat = $input['menu_category'];
      
        $input = $this->uploadImage($input);
        if(!empty($input['banner_picture_sm'])){
            $input = $this->uploadImage2($input);
        }
        if ($banner = Banner::create($input)) {

            $banner->menu()->sync($menucat);

            return true;
        }
        throw new GeneralException(trans('exceptions.backend.banners.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Banner $banner
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Banner $banner, array $input)
    {
        if  (is_array($input) && array_key_exists('banner_picture', $input)) {
            $this->deleteOldFile($banner);
            $input = $this->uploadImage($input);
        }
        if (is_array($input) && array_key_exists('banner_picture_sm', $input)) {
            $this->deleteOldFile2($banner);
            $input = $this->uploadImage2($input);
        }
        $menucat = $input['menu_category'];
    	if ($banner->update($input)){
            $banner->menu()->sync($menucat);
        }
            return true;

        throw new GeneralException(trans('exceptions.backend.banners.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Banner $banner
     * @throws GeneralException
     * @return bool
     */
    public function delete(Banner $banner)
    {
        if ($banner->delete()) {
            MenuMapBanner::where('banner_id', $banner->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.banners.delete_error'));
    }
    public function uploadImage($input)
    {
        $avatar = $input['banner_picture'];

        if (isset($input['banner_picture']) && !empty($input['banner_picture'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['banner_picture' => $fileName]);

            return $input;
        }
    }
    public function uploadImage2($input)
    {
            $avatar = $input['banner_picture_sm'];

            if (isset($input['banner_picture_sm']) && !empty($input['banner_picture_sm'])) {
                $fileName = time().$avatar->getClientOriginalName();
    
                $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));
    
                $input = array_merge($input, ['banner_picture_sm' => $fileName]);
    
                return $input;
            }
    }

    public function deleteOldFile($model)
    {
        $fileName = $model->banner_picture;

        return $this->storage->delete($this->upload_path.$fileName);
    }
    public function deleteOldFile2($model)
    {
        $fileName = $model->banner_picture_sm;

        return $this->storage->delete($this->upload_path.$fileName);
    }

}
