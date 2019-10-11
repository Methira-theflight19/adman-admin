<?php

namespace App\Repositories\Backend\Award;

use DB;
use Carbon\Carbon;
use App\Models\Award\Award;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\AwardSubCategoryMapAward\AwardSubCategoryMapAward;
/**
 * Class AwardRepository.
 */
class AwardRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Award::class;

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
                config('module.awards.table').'.id',
                config('module.awards.table').'.name',
                config('module.awards.table').'.content',
                config('module.awards.table').'.created_at',
                config('module.awards.table').'.updated_at',
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
        
        $category = $input['category'];
        $subcat = $input['subcategory'];
        if ($award = Award::create($input)) {
    
                $award->subcategory()->sync($subcat);
                $award->category()->sync($category);
            
 
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.awards.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Award $award
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Award $award, array $input)
    {
        $category = $input['category'];
        $subcat = $input['subcategory'];
        if ($award->update($input))

                $award->subcategory()->sync($subcat);
                $award->category()->sync($category);
            
            return true;

        throw new GeneralException(trans('exceptions.backend.awards.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Award $award
     * @throws GeneralException
     * @return bool
     */
    public function delete(Award $award)
    {
        if ($award->delete()) {
            AwardSubCategoryMapAward::where('award_id', $award->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.awards.delete_error'));
    }
}
