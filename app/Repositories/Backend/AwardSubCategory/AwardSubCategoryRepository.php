<?php

namespace App\Repositories\Backend\AwardSubCategory;

use DB;
use Carbon\Carbon;
use App\Models\AwardSubCategory\AwardSubCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\AwardCategoryMapAwardSubCategory\AwardCategoryMapAwardSubCategory;

/**
 * Class AwardSubCategoryRepository.
 */
class AwardSubCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AwardSubCategory::class;

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
                config('module.awardsubcategories.table').'.id',
                config('module.awardsubcategories.table').'.name',
                config('module.awardsubcategories.table').'.created_at',
                config('module.awardsubcategories.table').'.updated_at',
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
        $cat = $input['category'];
        if ($awardsubcategory =AwardSubCategory::create($input)) {
            $awardsubcategory->category()->sync($cat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.awardsubcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AwardSubCategory $awardsubcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AwardSubCategory $awardsubcategory, array $input)
    {
        $cat = $input['category'];
    	if ($awardsubcategory->update($input)){
            $awardsubcategory->category()->sync($cat);
            return true;
        }
           

        throw new GeneralException(trans('exceptions.backend.awardsubcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AwardSubCategory $awardsubcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(AwardSubCategory $awardsubcategory)
    {
        if ($awardsubcategory->delete()) {
            AwardCategoryMapAwardSubCategory::where('award_sub_id', $awardsubcategory->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.awardsubcategories.delete_error'));
    }
}
