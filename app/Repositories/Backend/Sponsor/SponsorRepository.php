<?php

namespace App\Repositories\Backend\Sponsor;

use DB;
use Carbon\Carbon;
use App\Models\Sponsor\Sponsor;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SponsorRepository.
 */
class SponsorRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sponsor::class;

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
                config('module.sponsors.table').'.id',
                config('module.sponsors.table').'.created_at',
                config('module.sponsors.table').'.updated_at',
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
        if (Sponsor::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sponsors.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sponsor $sponsor
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sponsor $sponsor, array $input)
    {
    	if ($sponsor->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sponsors.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sponsor $sponsor
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sponsor $sponsor)
    {
        if ($sponsor->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sponsors.delete_error'));
    }
}
