<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Repositories\Interfaces\CandidateRepositoryInterface;

class CandidateController extends Controller
{
    private $candidateRepository;

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
        $this->candidateRepository->create($request->all());
        session()->flash('success', 'Candidat ajouté avec succès !');
        return redirect('/candidates');
    }

    public function show($id)
    {
        $candidate = $this->candidateRepository->find($id);
        return view('hr.candidates.show', compact('candidate'));
    }

    public function edit($id)
    {
        $candidate = $this->candidateRepository->find($id);
        return view('hr.candidates.edit', compact('candidate'));
    }

    public function update(CandidateRequest $request, $id)
    {
        $this->candidateRepository->update($request->all(), $id);
        session()->flash('update', 'Candidat modifié avec succès !');
        return redirect('candidates');
    }

    public function destroy($id)
    {
        $this->candidateRepository->delete($id);
    }
}
