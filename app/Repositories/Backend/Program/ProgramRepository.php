<?php

namespace App\Repositories\Backend\Program;

use DB;
use Carbon\Carbon;
use App\Models\Program\Program;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProgramRepository.
 */
class ProgramRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Program::class;

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
        $this->upload_pathpdf = 'pdf'.DIRECTORY_SEPARATOR.'program'.DIRECTORY_SEPARATOR;
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'program'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.programs.table').'.id',
                config('module.programs.table').'.name',
                config('module.programs.table').'.image',
                config('module.programs.table').'.created_at',
                config('module.programs.table').'.updated_at',

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
        $input = $this->uploadImage2($input);
        if (Program::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.programs.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Program $program
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Program $program, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($banner);
            $input = $this->uploadImage($input);
        }
        if  (is_array($input) && array_key_exists('pdf', $input)) {
            $this->deleteOldFile2($banner);
            $input = $this->uploadImage2($input);
        }
    	if ($program->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.programs.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Program $program
     * @throws GeneralException
     * @return bool
     */
    public function delete(Program $program)
    {
        if ($program->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.programs.delete_error'));
    }

    public function uploadImage($input)
    {
        $avatar = $input['image'];

        if (isset($input['image']) && !empty($input['image'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['image' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile($model)
    {
        $fileName = $model->image;

        return $this->storage->delete($this->upload_path.$fileName);
    }

    public function uploadImage2($input)
    {
        $avatar = $input['pdf'];

        if (isset($input['pdf']) && !empty($input['pdf'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_pathpdf.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['pdf' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFile2($model)
    {
        $fileName = $model->pdf;

        return $this->storage->delete($this->upload_pathpdf.$fileName);
    }
}
