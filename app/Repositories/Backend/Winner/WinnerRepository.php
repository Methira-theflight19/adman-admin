<?php

namespace App\Repositories\Backend\Winner;

use DB;
use Carbon\Carbon;
use App\Models\Winner\Winner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class WinnerRepository.
 */
class WinnerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Winner::class;

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
        $this->upload_pathpdf = 'pdf'.DIRECTORY_SEPARATOR.'winner'.DIRECTORY_SEPARATOR;
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'winner'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.winners.table').'.id',
                config('module.winners.table').'.image',
                config('module.winners.table').'.pdf_1',
                config('module.winners.table').'.pdf_2',
                config('module.winners.table').'.created_at',
                config('module.winners.table').'.updated_at',
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
        $input = $this->uploadPdf1($input);
        $input = $this->uploadPdf2($input);
        if (Winner::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.winners.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Winner $winner
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Winner $winner, array $input)
    {
        if  (is_array($input) && array_key_exists('image', $input)) {
            $this->deleteOldFile($winner);
            $input = $this->uploadImage($input);
        }
        if  (is_array($input) && array_key_exists('pdf_1', $input)) {
            $this->deleteOldFilePdf1($winner);
            $input = $this->uploadImage2($input);
        }
        if  (is_array($input) && array_key_exists('pdf_2', $input)) {
            $this->deleteOldFilePdf2($winner);
            $input = $this->uploadImage2($input);
        }
    	if ($winner->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.winners.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Winner $winner
     * @throws GeneralException
     * @return bool
     */
    public function delete(Winner $winner)
    {
        if ($winner->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.winners.delete_error'));
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

    public function uploadPdf1($input)
    {
        $avatar = $input['pdf_1'];

        if (isset($input['pdf_1']) && !empty($input['pdf_1'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_pathpdf.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['pdf_1' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFilePdf1($model)
    {
        $fileName = $model->pdf_1;

        return $this->storage->delete($this->upload_pathpdf.$fileName);
    }
    public function uploadPdf2($input)
    {
        $avatar = $input['pdf_2'];

        if (isset($input['pdf_2']) && !empty($input['pdf_2'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_pathpdf.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['pdf_2' => $fileName]);

            return $input;
        }
    }
    public function deleteOldFilePdf2($model)
    {
        $fileName = $model->pdf_2;

        return $this->storage->delete($this->upload_pathpdf.$fileName);
    }
}
