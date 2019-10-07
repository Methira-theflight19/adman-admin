<?php

namespace App\Repositories\Backend\GalleryCategory;

use DB;
use Carbon\Carbon;
use App\Models\GalleryCategory\GalleryCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryCategoryRepository.
 */
class GalleryCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = GalleryCategory::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.gallerycategories.table').'.id',
                config('module.gallerycategories.table').'.name',
                config('module.gallerycategories.table').'.active',
                config('module.gallerycategories.table').'.created_at',
                config('module.gallerycategories.table').'.updated_at',
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
        if (GalleryCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.gallerycategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param GalleryCategory $gallerycategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(GalleryCategory $gallerycategory, array $input)
    {
    	if ($gallerycategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.gallerycategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param GalleryCategory $gallerycategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(GalleryCategory $gallerycategory)
    {
        if ($gallerycategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.gallerycategories.delete_error'));
    }
}
