<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository){
        $this->middleware('auth');
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects =$this->projectRepository->all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = $this->projectRepository->getClients();
        return view('projects.create',compact('clients'));
    }

    public function store(ProjectRequest $request)
    {
        $this->projectRepository->addProject($request->all());
        session()->flash('success', 'Project has been added');
        return redirect('/projects');
    }

    public function show($id)
    {
        $project = $this->projectRepository->find($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = $this->projectRepository->find($id);
        $clients = $this->projectRepository->getClients();
        return view('projects.edit', compact('project','clients'));

    }

    public function update(ProjectRequest $request, $id)
    {
        $this->projectRepository->updateProject($request->all(), $id);
        session()->flash('update', 'Project has been added');
        return redirect('/projects');
    }

    public function destroy($id)
    {
        $this->projectRepository->delete($id);
    }

    public function export(){
        return $this->projectRepository->exportProjectsDataAsExcel();
    }
}
