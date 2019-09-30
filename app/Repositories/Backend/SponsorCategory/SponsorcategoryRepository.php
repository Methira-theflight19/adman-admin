<?php

namespace App\Repositories\Backend\SponsorCategory;

use DB;
use Carbon\Carbon;
use App\Models\SponsorCategory\Sponsorcategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SponsorcategoryRepository.
 */
class SponsorcategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sponsorcategory::class;

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
                config('module.sponsorcategories.table').'.id',
                config('module.sponsorcategories.table').'.sponsor_category',
                config('module.sponsorcategories.table').'.created_at',
                config('module.sponsorcategories.table').'.updated_at',
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
        if (Sponsorcategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sponsorcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sponsorcategory $sponsorcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sponsorcategory $sponsorcategory, array $input)
    {
    	if ($sponsorcategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sponsorcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sponsorcategory $sponsorcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sponsorcategory $sponsorcategory)
    {
        if ($sponsorcategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sponsorcategories.delete_error'));
    }
}
