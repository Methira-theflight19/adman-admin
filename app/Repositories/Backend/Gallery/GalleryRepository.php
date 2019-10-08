<?php

namespace App\Repositories\Backend\Gallery;

use DB;
use Carbon\Carbon;
use App\Models\Gallery\Gallery;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\GalleryMapGalleryCategory\GalleryMapGalleryCategory;

/**
 * Class GalleryRepository.
 */
class GalleryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Gallery::class;

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
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'gallery'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.galleries.table').'.id',
                config('module.galleries.table').'.name',
                config('module.galleries.table').'.year',
                config('module.galleries.table').'.created_at',
                config('module.galleries.table').'.updated_at',
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

        $gallerycat = $input['gallery_category'];
        $input['year'] = Carbon::parse($input['year'])->format('Y');
        $input = $this->uploadImage($input);

        if ($gallery =  Gallery::create($input)) {
            $gallery->category()->sync($gallerycat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.galleries.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Gallery $gallery
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Gallery $gallery, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($gallery);
            $input = $this->uploadImage($input);
        }
        $gallerycat = $input['gallery_category'];
        $input['year'] = Carbon::parse($input['year'])->format('Y');
    	if ($gallery->update($input)){
            $gallery->category()->sync($gallerycat);
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.galleries.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Gallery $gallery
     * @throws GeneralException
     * @return bool
     */
    public function delete(Gallery $gallery)
    {
        $this->deleteOldFile($gallery);
        if ($gallery->delete()) {
            GalleryMapGalleryCategory::where('gallery_id', $gallery->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.galleries.delete_error'));
    }
    public function uploadImage($input)
    {
        $avatar = $input['image'];

        if (isset($input['image']) && !empty($input['image'])) {

            $fileName2 = '';
            foreach ($avatar as $avatars) {
                        // $file->store('users/' . $this->user->id . '/messages');
                $fileName = time().$avatars->getClientOriginalName();
                $fileName2 = $fileName2.','.$fileName;
                $this->storage->put($this->upload_path.$fileName, file_get_contents($avatars->getRealPath()));
  
            }
            $input = array_merge($input, ['image' => $fileName2]);
            return $input;


        }
    }
    public function deleteOldFile($model)
    {
        $fileName = $model->image;
        $allimage =   explode(",",$fileName);
        foreach ($allimage as $key => $allimages) {

            if($key != 0){
                echo ($this->upload_path.$allimages);
                return $this->storage->delete($this->upload_path.$allimages);
            }
          
        }

    }
}
