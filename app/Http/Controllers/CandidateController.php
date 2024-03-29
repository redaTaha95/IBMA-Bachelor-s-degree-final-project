<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Repositories\Interfaces\CandidateRepositoryInterface;

class CandidateController extends Controller
{
    private $candidateRepository;
   // private $experienceRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->middleware('auth');
        $this->candidateRepository = $candidateRepository;
    }

    public function index()
    {
        $candidates = $this->candidateRepository->all();
        return view('hr.candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('hr.candidates.create');
    }

    public function store(CandidateRequest $request)
    {
        $this->candidateRepository->addCandidateWithExperienceAndDiploma($request->all());
        session()->flash('success', 'Candidat ajouté avec succès !');
        return redirect('/candidates');
    }

    public function show($id)
    {
        $candidate = $this->candidateRepository->find($id);
        $recruitmentDemands = $this->candidateRepository->getRecruitmentDemands();
        return view('hr.candidates.show', compact('candidate', 'recruitmentDemands'));
    }

    public function edit($id)
    {
        $candidate = $this->candidateRepository->find($id);
        $experiences =  $candidate->experiences;
        $trainings =  $candidate->trainings;
        return view('hr.candidates.edit', compact('candidate','experiences','trainings'));
    }

    public function update(CandidateRequest $request, $id)
    {
        $this->candidateRepository->updateCandidateWithExperienceAndDiploma($request->all(), $id);
        session()->flash('update', 'Candidat modifié avec succès !');
        return redirect('candidates');
    }

    public function destroy($id)
    {
        $this->candidateRepository->delete($id);
    }

    public function export(){
        return $this->candidateRepository->exportCandidatesDataAsExcel();
    }

    public function affectDemand($candidate_id, $demand_id){
        $this->candidateRepository->affectRecruitmentDemandToCandidate($candidate_id, $demand_id);
        return redirect()->back();
    }

    public function disaffectDemand($candidate_id, $demand_id){
        $this->candidateRepository->disaffectRecruitmentDemandToCandidate($candidate_id, $demand_id);
        return redirect()->back();
    }
}
