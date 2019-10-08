<?php

namespace App\Repositories\Backend\JudgeCategory;

use DB;
use Carbon\Carbon;
use App\Models\JudgeCategory\JudgeCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JudgeCategoryRepository.
 */
class JudgeCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = JudgeCategory::class;

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
                config('module.judgecategories.table').'.id',
                config('module.judgecategories.table').'.name',
                config('module.judgecategories.table').'.active',
                config('module.judgecategories.table').'.created_at',
                config('module.judgecategories.table').'.updated_at',
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
        if (JudgeCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.judgecategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param JudgeCategory $judgecategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(JudgeCategory $judgecategory, array $input)
    {
    	if ($judgecategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.judgecategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param JudgeCategory $judgecategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(JudgeCategory $judgecategory)
    {
        if ($judgecategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.judgecategories.delete_error'));
    }
}
