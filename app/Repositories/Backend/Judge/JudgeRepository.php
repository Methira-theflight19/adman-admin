<?php

namespace App\Repositories\Backend\Judge;

use DB;
use Carbon\Carbon;
use App\Models\Judge\Judge;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\JudgeCategory;
use App\Models\JudgeMapJudgeCategory;
/**
 * Class JudgeRepository.
 */
class JudgeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Judge::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    protected $upload_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;
    public function __construct()
    {
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'judge'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.judges.table').'.id',
                config('module.judges.table').'.name',
                config('module.judges.table').'.judge_picture',
                config('module.judges.table').'.created_at',
                config('module.judges.table').'.updated_at',
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
        $input = $this->uploadImage($input);
        $judgecat = $input['judgecat'];
        if ($judge = Judge::create($input)) {
            $judge->category()->sync($judgecat);
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.judges.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Judge $judge
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Judge $judge, array $input)
    {
        if  (is_array($input) && array_key_exists('judge_picture', $input)) {
            $this->deleteOldFile($judge);
            $input = $this->uploadImage($input);
        }
        $judgecat = $input['judgecat'];
    	if ($judge->update($input)){
            $judge->category()->sync($judgecat);
            return true;
        }
           

        throw new GeneralException(trans('exceptions.backend.judges.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Judge $judge
     * @throws GeneralException
     * @return bool
     */
    public function delete(Judge $judge)
    {
        if ($judge->delete()) {
            JudgeMapJudgeCategory::where('judge_id', $judge->id)->delete();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.judges.delete_error'));
    }
    public function uploadImage($input)
    {
        $avatar = $input['judge_picture'];

        if (isset($input['judge_picture']) && !empty($input['judge_picture'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['judge_picture' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile($model)
    {
        $fileName = $model->judge_picture   ;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
