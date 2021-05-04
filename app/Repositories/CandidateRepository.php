<?php


namespace App\Repositories;

use App\Exports\CandidatesExport;
use App\Models\Candidate;
use Maatwebsite\Excel\Facades\Excel;

class CandidateRepository extends BaseRepository implements Interfaces\CandidateRepositoryInterface
{
    public function __construct(Candidate $model)
    {
        parent::__construct($model);
    }

    public function exportCandidatesDataAsExcel()
    {
        return Excel::download(new CandidatesExport, 'candidates.xlsx');
    }
}
