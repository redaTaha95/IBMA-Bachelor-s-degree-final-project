<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository){
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects =$this->projectRepository->all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
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
    }

    public function edit($id)
    {
        $project = $this->projectRepository->find($id);
        return view('projects.edit', compact('project'));
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
}
