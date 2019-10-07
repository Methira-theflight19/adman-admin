<?php

namespace App\Repositories\Backend\AboutCommitteeCategory;

use DB;
use Carbon\Carbon;
use App\Models\AboutCommitteeCategory\AboutCommitteeCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AboutCommitteeCategoryRepository.
 */
class AboutCommitteeCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AboutCommitteeCategory::class;

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
                config('module.aboutcommitteecategories.table').'.id',
                config('module.aboutcommitteecategories.table').'.name',
                config('module.aboutcommitteecategories.table').'.created_at',
                config('module.aboutcommitteecategories.table').'.updated_at',
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
        if (AboutCommitteeCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.aboutcommitteecategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AboutCommitteeCategory $aboutcommitteecategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AboutCommitteeCategory $aboutcommitteecategory, array $input)
    {
    	if ($aboutcommitteecategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.aboutcommitteecategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AboutCommitteeCategory $aboutcommitteecategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(AboutCommitteeCategory $aboutcommitteecategory)
    {
        if ($aboutcommitteecategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.aboutcommitteecategories.delete_error'));
    }
}
