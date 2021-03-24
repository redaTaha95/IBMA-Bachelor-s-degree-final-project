<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecruitmentDemandRequest;
use App\Repositories\Interfaces\RecruitmentDemandRepositoryInterface;

class RecruitmentDemandController extends Controller
{
    private $recruitmentDemandRepository;

    public function __construct(RecruitmentDemandRepositoryInterface $recruitmentDemandRepository)
    {
//        $this->middleware('auth');
        $this->recruitmentDemandRepository = $recruitmentDemandRepository;
    }

    public function index()
    {
        $recruitmentDemands = $this->recruitmentDemandRepository->all();
        return view('hr.recruitment_demands.index', compact('recruitmentDemands'));
    }

    public function create()
    {
        return view('hr.recruitment_demands.create');
    }

    public function store(RecruitmentDemandRequest $request)
    {
        $this->recruitmentDemandRepository->create($request->all());
        session()->flash('success', 'Demande de recrutement ajoutée avec succès !');
        return redirect('/recruitment_demands');
    }

    public function show($id)
    {
        $recruitmentDemand = $this->recruitmentDemandRepository->find($id);
        return view('hr.recruitment_demands.show', compact('recruitmentDemand'));
    }

    public function edit($id)
    {
        $recruitmentDemand = $this->recruitmentDemandRepository->find($id);
        return view('hr.recruitment_demands.edit', compact('recruitmentDemand'));
    }

    public function update(RecruitmentDemandRequest $request, $id)
    {
        $this->recruitmentDemandRepository->update($request->all(), $id);
        session()->flash('update', 'Demande de recrutement modifiée avec succès !');
        return redirect('recruitment_demands');
    }

    public function destroy($id)
    {
        $this->recruitmentDemandRepository->delete($id);
    }
}
