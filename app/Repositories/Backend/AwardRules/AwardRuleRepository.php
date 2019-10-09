<?php

namespace App\Repositories\Backend\AwardRules;

use DB;
use Carbon\Carbon;
use App\Models\AwardRules\AwardRule;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AwardRuleRepository.
 */
class AwardRuleRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = AwardRule::class;

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
                config('module.awardrules.table').'.id',
                config('module.awardrules.table').'.name',
                config('module.awardrules.table').'.content',
                config('module.awardrules.table').'.created_at',
                config('module.awardrules.table').'.updated_at',
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
        if (AwardRule::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.awardrules.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param AwardRule $awardrule
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(AwardRule $awardrule, array $input)
    {
    	if ($awardrule->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.awardrules.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param AwardRule $awardrule
     * @throws GeneralException
     * @return bool
     */
    public function delete(AwardRule $awardrule)
    {
        if ($awardrule->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.awardrules.delete_error'));
    }
}
