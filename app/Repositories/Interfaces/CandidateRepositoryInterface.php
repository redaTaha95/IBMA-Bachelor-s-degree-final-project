<?php


namespace App\Repositories\Interfaces;


interface CandidateRepositoryInterface
{
    public function exportCandidatesDataAsExcel();
    public function getRecruitmentDemands();
    public function affectRecruitmentDemandToCandidate($candidate_id, $demand_id);
    public function disaffectRecruitmentDemandToCandidate($candidate_id, $demand_id);
    public function addExperience($data,$candidate_id);
    public function updateExperience($data, $candidate_id);
    public function addTraining($data,$candidate_id);
    public function updateTraining($data, $candidate_id);
    public function addCandidateWithExperienceAndDiploma($data);
    public function updateCandidateWithExperienceAndDiploma($data, $candidate_id);
    //public function editExperience($candidate_id);
    //public function editTraining($candidate_id);

}
