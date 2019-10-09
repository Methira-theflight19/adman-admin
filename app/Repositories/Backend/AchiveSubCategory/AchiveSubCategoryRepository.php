<?php

namespace App\Repositories\Backend\AchiveSubCategory;

use DB;
use Carbon\Carbon;
use App\Models\AchiveSubCategory\AchiveSubCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\AchiveSubCategoryMapAchiveCategory\AchiveSubCategoryMapAchiveCategory;

/**
 * Class AchiveSubCategoryRepository.
 */
class AchiveSubCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AchiveSubCategory::class;

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
                config('module.achivesubcategories.table').'.id',
                config('module.achivesubcategories.table').'.name',
                config('module.achivesubcategories.table').'.created_at',
                config('module.achivesubcategories.table').'.updated_at',
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
        if ($achivesubcategory = AchiveSubCategory::create($input)) {
            $achivesubcategory->category()->sync($cat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.achivesubcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AchiveSubCategory $achivesubcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AchiveSubCategory $achivesubcategory, array $input)
    {
        $cat = $input['category'];
    	if ($achivesubcategory->update($input)){
            $achivesubcategory->category()->sync($cat);
            return true;
        }
            

        throw new GeneralException(trans('exceptions.backend.achivesubcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AchiveSubCategory $achivesubcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(AchiveSubCategory $achivesubcategory)
    {
        if ($achivesubcategory->delete()) {
            AchiveSubCategoryMapAchiveCategory::where('achive_sub_cat_id', $achivesubcategory->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.achivesubcategories.delete_error'));
    }
}
