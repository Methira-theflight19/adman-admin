<?php

namespace App\Http\Controllers\Backend\Program;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Program\ProgramRepository;
use App\Http\Requests\Backend\Program\ManageProgramRequest;

/**
 * Class ProgramsTableController.
 */
class ProgramsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProgramRepository
     */
    protected $program;

    /**
     * contructor to initialize repository object
     * @param ProgramRepository $program;
     */
    public function __construct(ProgramRepository $program)
    {
        $this->program = $program;
    }

    /**
     * This method return the data of the model
     * @param ManageProgramRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProgramRequest $request)
    {
        return Datatables::of($this->program->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('image', function ($program) {
                $url= asset('storage/img/program/'.$program->image);
                 return '<img src="'.$url.'" border="0" width="200px" class="img-rounded" align="center" />';
            })
            ->addColumn('created_at', function ($program) {
                return Carbon::parse($program->created_at)->toDateString();
            })
            ->addColumn('actions', function ($program) {
                return $program->action_buttons;
            })
            ->make(true);
    }
}
