<?php


namespace App\Repositories\Interfaces;


interface CandidateRepositoryInterface
{
    public function exportCandidatesDataAsExcel();
    public function getRecruitmentDemands();
    public function affectRecruitmentDemandToCandidate($candidate_id, $demand_id);
    public function disaffectRecruitmentDemandToCandidate($candidate_id, $demand_id);
}
