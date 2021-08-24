<?php


namespace App\Repositories;

use App\Exports\CandidatesExport;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\RecruitmentDemand;
use App\Models\Training;
use Maatwebsite\Excel\Facades\Excel;

class CandidateRepository extends BaseRepository implements Interfaces\CandidateRepositoryInterface
{
    public function __construct(Candidate $model)
    {
        parent::__construct($model);
    }

    public function create(array $data)
    {
        return parent::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'birthday' => $data['birthday'],
            'cin' => $data['cin'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'status' => $data['status'],
        ]);
    }

    public function update(array $data, $id)
    {
        return parent::update([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'birthday' => $data['birthday'],
            'cin' => $data['cin'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'status' => $data['status'],
        ], $id);
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

    public function addExperience($data, $candidate_id)
    {
         Experience::create([
            'description' => $data['description'],
            'post' => $data['post'],
            'year' => $data['year'],
             'candidate_id' => $candidate_id,
        ]);
    }

    public function updateExperience($data, $candidate_id)
    {
      return  Experience::update([
            'description' => $data['description'],
            'post' => $data['post'],
            'year' => $data['year'],
        ], $candidate_id);
    }

    public function addTraining($data, $candidate_id)
    {
        Training::create([
            'description_training' => $data['description_training'],
            'graduation_year' => $data['graduation_year'],
            'candidate_id' => $candidate_id,
        ]);
    }

    public function updateTraining($data, $candidate_id)
    {
         return Training::update([
            'description_training' => $data['description_training'],
            'graduation_year' => $data['graduation_year'],
        ], $candidate_id);
    }

    public function addCandidateWithExperienceAndDiploma($data)
    {
       $candidate = $this->create($data);
       $this->addExperience($data, $candidate->id);
       $this->addTraining($data, $candidate->id);
    }

    public function updateCandidateWithExperienceAndDiploma($data, $candidate_id)
    {
        $candidate = $this->update($data, $candidate_id);
        $this->updateExperience($data, $candidate->id);
        $this->updateTraining($data, $candidate->id);
    }

}
