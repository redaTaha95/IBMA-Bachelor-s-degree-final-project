<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\Interfaces\TasksListRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;
    private $listRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, TasksListRepositoryInterface $listRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
        $this->listRepository = $listRepository;
    }

    public function index($project_id)
    {
        $tasks_list = $this->listRepository->getTasksListsByProject($project_id);
        $employees = $this->taskRepository->getEmployees();
        $project = $this->taskRepository->getProject($project_id);
        return view('tasks.index', compact(
            'tasks_list',
            'employees',
            'project'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $project_id)
    {
        $this->taskRepository->create($request->except('employee_id'));
        return redirect('/tasks', compact('project_id'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(TaskRequest $request, $id, $project_id)
    {
        $this->taskRepository->update($request->except('employee_id'), $id);
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $this->taskRepository->delete($id);
    }

    public function affectEmployee($task_id, $employee_id){
        $this->taskRepository->affectTaskToEmployee($task_id, $employee_id);
    }
}
