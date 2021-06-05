<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->all();
        $tasks_list = $this->taskRepository->getTasksList();
        $employees = $this->taskRepository->getEmployees();
        $projects = $this->taskRepository->getProjects();
        return view('tasks.index', compact('tasks', 'tasks_list', 'employees', 'projects'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->taskRepository->create($request->except('employee_id'));
        return redirect('/tasks');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(TaskRequest $request, $id)
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
