<?php

namespace App\Repositories\Backend\MenuCategory;

use DB;
use Carbon\Carbon;
use App\Models\MenuCategory\Menucategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenucategoryRepository.
 */
class MenucategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Menucategory::class;

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
                config('module.menucategories.table').'.id',
                config('module.menucategories.table').'.menu_name',
                config('module.menucategories.table').'.created_at',
                config('module.menucategories.table').'.updated_at',
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
        if (Menucategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.menucategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Menucategory $menucategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Menucategory $menucategory, array $input)
    {
    	if ($menucategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.menucategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Menucategory $menucategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(Menucategory $menucategory)
    {
        if ($menucategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.menucategories.delete_error'));
    }
}
