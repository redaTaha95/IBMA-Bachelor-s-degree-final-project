<?php


namespace App\Repositories;

use App\Exports\CandidatesExport;
use App\Models\Candidate;
use App\Models\RecruitmentDemand;
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

    public function getRecruitmentDemands()
    {
        return RecruitmentDemand::all();
    }

    public function affectRecruitmentDemandToCandidate($candidate_id, $demand_id)
    {
        $candidate = Candidate::find($candidate_id);
        $candidate->recruitment_demands()->attach($demand_id);
    }

    public function disaffectRecruitmentDemandToCandidate($candidate_id, $demand_id)
    {
        $candidate = Candidate::find($candidate_id);
        $candidate->recruitment_demands()->detach($demand_id);
    }
}
